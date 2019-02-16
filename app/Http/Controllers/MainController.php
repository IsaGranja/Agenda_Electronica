<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class MainController extends Controller
{
    function index()
    {
        return view('login');
    }
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        //$credentials = $request->only('email', 'password');

        if (Auth::attempt($user_data)) {
            // Authentication passed...
            return redirect()->intended('main/successlogin');
        }
        /*if(Auth::attempt($user_data))
        {
            return redirect('main/successlogin');
        }*/
        else
        {
            return back()->with('error', 'Datos de login erróneos');
        }
    }
    function successlogin()
    {
        return view('home');
    }
    function logout()
    {
        Auth::logout();
        return redirect('main');
    }
}
