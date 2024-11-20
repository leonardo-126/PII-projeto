<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> teste
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user()->hasVerifiedEmail()
<<<<<<< HEAD
                    ? redirect()->intended(RouteServiceProvider::HOME)
=======
                    ? redirect()->intended(route('dashboard', absolute: false))
>>>>>>> teste
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
