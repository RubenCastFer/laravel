<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmpleadoController;
use App\Mail\NotificacionContrasenya;
use App\Models\EmpleadoAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * EmpleadoAuthController
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class EmpleadoAuthController extends Controller
{
    /**
     * Muestra el login
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (session()->get('tipo') == 'empleado') {
            return redirect()->route('empleado.dashboard');
        } else {
            return view('auth.empleadoLogin');
        }
    }

    /**
     * Comprueba el inicio de sesión
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('empleado')->attempt($credentials)) {

            $request->session()->regenerate();
            $request->session()->put('tipo', 'empleado');
            $empleado = EmpleadoAuth::empleado($request->input('email'));
            session()->put('usuario', $empleado);

            $passwordDNI = EmpleadoAuth::passwordDNI($request->input('email'));
            if (password_verify($passwordDNI[0]->dni, $passwordDNI[0]->password)) {
                return redirect()->intended('/empleado/cambiopassword');
            }
            return redirect()->intended('/empleado/dashboard');
        }

        return redirect()->back()->withError('Email o Contraseña incorrectas');
    }

    /**
     * Destruye la sesión
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('empleado')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/empleado/login');
    }

    
    /**
     * Modifica los datos pasado por parámetros del empleado selecionado
     *
     * @param  mixed $request
     * @return void
     */
    public function updateEmpleado(Request $request)
    {
        $empleado = null;
        if ($request->input('id_Empleado') != null) {
            $empleado = EmpleadoAuth::find($request->input('id_Empleado'));
            $empleado->fill($request->all());
        } else {
            $empleado = new EmpleadoAuth($request->all());
            $empleado['password'] = Hash::make($empleado['dni']);
            Mail::to($empleado->email)->send(new NotificacionContrasenya($empleado));
        }
        $empleado->save();
        return redirect()->action([EmpleadoController::class, 'tablaEmpleados']);
    }
    
    /**
     * Muestra el formulario del cambio de contraseña
     *
     * @return void
     */
    public function showcambiarContrasenya()
    {
        return view('auth.empleadopassword');
    }
    
    /**
     * Cambiar la contraseña
     *
     * @param  mixed $request
     * @return void
     */
    public function cambiarContrasenya(Request $request)
    {
        if ($request->input('password') == $request->input('passwordconfirm')) {
            $passwordDNI = EmpleadoAuth::passwordDNI(session('usuario')[0]->email);
            if (password_verify($request->input('password'), $passwordDNI[0]->password)) {
                return redirect()->back()->withError('Por favor, cambié su contraseña por defecto');
            } elseif(password_verify($request->input('passwordactual'), $passwordDNI[0]->password)) {
                $empleado = EmpleadoAuth::find(session('usuario')[0]->id_Empleado);
                $empleado['password'] = Hash::make($request->input('password'));
                $empleado->save();

                return redirect()->back()->with('success','Contraseña cambiada con éxito');
            } else{
                $empleado = EmpleadoAuth::find(session('usuario')[0]->id_Empleado);
                $empleado['password'] = Hash::make($request->input('password'));
                $empleado->save();

                return redirect()->intended('/empleado/dashboard');
            }
        } else {
            return redirect()->back()->withError('Por favor, introduzca un par de contraseñas validas');
        }
    }
    
    /**
     * Modifica los datos pasado por parámetros del usuario empleado
     *
     * @param  mixed $request
     * @return void
     */
    public function cambioUsuario(Request $request){
        $empleado = EmpleadoAuth::find(session('usuario')[0]->id_Empleado);
        $empleado->fill($request->all());
        $empleado->save();
        $empleado = EmpleadoAuth::empleado($empleado->email);
        session()->put('usuario', $empleado);
        return redirect()->intended('/empleado/perfil');
    }
}
