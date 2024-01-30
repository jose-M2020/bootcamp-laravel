<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        $user = User::with('todos')->find(1);
        return $user;
    }
}
