<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class ClienteLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/cliente/menu';

    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
     return Auth::guard('cliente');
    }
    public function showLoginForm()
    {
        return view('cliente.login');
    }

    
}
