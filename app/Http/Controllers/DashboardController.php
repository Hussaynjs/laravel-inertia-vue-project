<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
   public function index(Request $request){
    // $user = User::get();
    // dd($user);
      
     $listings = $request->user()->role !== 'suspended' ?
      $request->user()->listings()->latest()->paginate(10) :
      null;
      return Inertia::render('Dashboard', [
       'listings' => $listings,
      'status' => session('status')
    ]);
   }
}
