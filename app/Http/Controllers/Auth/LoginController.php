<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function create(){
    return Inertia::render('Auth/login',
   [
      'status' => session('status')
   ]);
   }

   public function store(Request $request){
      $credentials = $request->validate([
         'email' => 'required|lowercase|email|max:255',
         'password' => 'required|min:3'
     ]);

     if(Auth::attempt($credentials, $request->boolean('remember'))){
       
      $request->session()->regenerate();

      return redirect()->intended('dashboard');

     }
     return back()->withErrors([
      'email' => 'credential donot match our records'
   ])->onlyInput('email');

   }

   public function destroy(Request $request){
     Auth::logout();

     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return redirect('/');
   }


}
