<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ClienteAuth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteAuthController extends Controller
{

    
    /**
     * Display admin login view
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
     * Handle an incoming admin authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // $remember=true;
        // if(auth()->guard('cliente')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password, $remember
        // ])) {
            
        //     $request->session()->regenerate();
        //     $request->session()->put('tipo', 'cliente');
        //     return redirect()->intended(url('/cliente/dashboard'));
        // } else {
        //     return redirect()->back()->withError('Credentials doesn\'t match.');
        // }


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
            return redirect()->intended('/cliente/dashboard');
        }
 
        return redirect()->back()->withError('Email o Contraseña incorrectas');
    }

    /**
     * Destroy an authenticated session.
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


    
    public function showRegisterForm()
    {
        

        if (session()->get('tipo')=='cliente') {
            return redirect()->route('cliente.dashboard');
        } else {
            return view('auth.clienteRegister');
        }
    }

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
}
