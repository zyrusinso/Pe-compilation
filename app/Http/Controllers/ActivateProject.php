<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ActivateProject extends Controller
{
    public function activate(){
        if(count(User::all()) < 1){
            return User::create([
                'fname' => 'Super',
                'lname' => 'Admin',
                'is_admin' => 1,
                'email' => 'admin@gmail.com',
                'password' => Hash::make(12345),
            ]);
        }
        return 'Already Activated!';
    }
}
