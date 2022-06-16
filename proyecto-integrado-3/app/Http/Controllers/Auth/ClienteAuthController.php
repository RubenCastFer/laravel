<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ClienteAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * ClienteAuthController
 * 
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class ClienteAuthController extends Controller
{

    
    /**
     * Muestra el login
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        
        
        if (session()->get('tipo')=='cliente') {
            return redirect()->route('cliente.dashboard');
        } else {
            return view('auth.clienteLogin');
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
 
        if (Auth::guard('cliente')->attempt($credentials)) {

            $request->session()->regenerate();
            $request->session()->put('tipo', 'cliente');
            $cliente = ClienteAuth::cliente($request->input('email'));
            
            $request->session()->put('usuario', $cliente);
            if (!empty(session('datosPresupuesto'))) {
                return redirect()->action([ClienteController::class, 'presupuesto']);
            }
            return redirect()->intended('/');
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
        Auth::guard('cliente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/cliente/login');
    }


        
    /**
     * Muestra el formulario de registro
     *
     * @return void
     */
    public function showRegisterForm()
    {
        

        if (session()->get('tipo')=='cliente') {
            return redirect()->route('cliente.dashboard');
        } else {
            return view('auth.clienteRegister');
        }
    }
    
    /**
     * Guarda los campos de formulario de registro en la base de datos
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request){
        $cliente = new ClienteAuth($request->all());
        $cliente['password']=Hash::make($cliente['password']);
        $cliente->save();

        //intentar sustituir llamando al login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('cliente')->attempt($credentials)) {

            $request->session()->regenerate();
            $request->session()->put('tipo', 'cliente');
            $cliente = ClienteAuth::cliente($request->input('email'));
            
            session()->put('usuario', $cliente);
            if (!empty(session('datosPresupuesto'))) {
                return redirect()->action([ClienteController::class, 'presupuesto']);
            }
            return redirect()->intended('/cliente/dashboard');
        }
        
        return redirect()->back()->withError('Email o Contraseña incorrectas');
    }
    
    /**
     * Cambiar contraseña
     *
     * @param  mixed $request
     * @return void
     */
    public function cambiarContrasenya(Request $request)
    {
        if ($request->input('password') == $request->input('passwordconfirm')) {
            $password = ClienteAuth::password(session('usuario')[0]->email);
            if (password_verify($request->input('passwordactual'), $password[0]->password)) {
                $cliente = ClienteAuth::find(session('usuario')[0]->id_Cliente);
                $cliente['password'] = Hash::make($request->input('password'));
                $cliente->save();
                return redirect()->back()->with('success','Contraseña cambiada con éxito');
            } else {
                return redirect()->back()->withError('Contraseña errónea');
            }
        } else {
            return redirect()->back()->withError('Por favor, introduzca un par de contraseñas validas');
        }
    }
    
    /**
     * Modifica los datos pasado por parámetros del usuario
     *
     * @param  mixed $request
     * @return void
     */
    public function cambioUsuario(Request $request){
        $cliente = ClienteAuth::find(session('usuario')[0]->id_Cliente);
        $cliente->fill($request->all());
        $cliente->save();
        $cliente = ClienteAuth::cliente($cliente->email);
        session()->put('usuario', $cliente);
        return redirect()->intended('/cliente/perfil');
    }
}
