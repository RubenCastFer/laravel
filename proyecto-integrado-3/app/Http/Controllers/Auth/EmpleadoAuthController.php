<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class EmpleadoAuthController extends Controller
{
    /**
     * Display admin login view
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

        // if (auth()->guard('empleado')->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ])) {
        //     $user = auth()->user();

        //     $request->session()->put('tipo', 'empleado');
        //     return redirect()->intended(url('/empleado/dashboard'));
        // } else {
        //     return redirect()->back()->withError('Credentials doesn\'t match.');
        // }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('empleado')->attempt($credentials)) {

            $request->session()->regenerate();
            $request->session()->put('tipo', 'empleado');
            return redirect()->intended('/empleado/dashboard');
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
        Auth::guard('empleado')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/empleado/login');
    }
}
