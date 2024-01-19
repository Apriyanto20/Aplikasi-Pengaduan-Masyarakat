<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('pages.user.profile.index');
    }
}
