<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Response;

class AuthController extends Controller
{
    public function showLogin(): Response
    {
        return inertia('auth/Login');
    }
}
