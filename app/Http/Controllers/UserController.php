<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showUsers() {
        return view('attribute', [
            'title' => 'Users',
            'attributes' => User::latest()->paginate(6)->withQueryString(),
            'type' => 'user'
        ]);
    }
}
