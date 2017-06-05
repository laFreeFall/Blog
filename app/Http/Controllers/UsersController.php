<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function index(User $user) {
        $articles = $user->articles()->latest()->get();
        return view('articles.index', compact('articles', 'user'));
    }
}
