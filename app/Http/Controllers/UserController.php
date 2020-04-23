<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
  public function index()
   {
       $users = User::all();

       return view('user', compact('users'));
   }

   public function approve($user_id)
   {
       $user = User::findOrFail($user_id);
       $user->update(['approved_at' => now()]);

       return redirect()->route('admin.users.index')->withMessage('User approved successfully');
   }

   public function deactive($user_id)
   {
       $user = User::findOrFail($user_id);
       $user->update(['approved_at' => null]);

       return redirect()->route('admin.users.index')->withMessage('User deactived successfully');
   }
}
