<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index(){

        $users = User::with('listings')
        ->filter(request(['search']))
        ->paginate(5)
        ->withQueryString();
       

        return Inertia::render('Admin/AdminDashboard', [
            'users' => $users,
            'status' => session('status')
        ]);
    }

    public function show(User $user){
        $user_listings = $user->listings;

        return Inertia::render('Admin/UserPage',[
            'user_listings' => $user_listings,
            'user' => $user,
        ]);
    }

    public function role(Request $request, User $user){
      $user->update(['role' => $request->role]);

      return 
      redirect()
      ->route('admin.index')
      ->with('status', "the user role role have been changes to $request->role successfully");
    }
}
