<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class EmpleadoLoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/empleado/menu';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function guard()
  {
    return Auth::guard('empleado');
  }
  public function showLoginForm()
  {
    return view('empleado.login');
  }
}
