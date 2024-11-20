<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> teste
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
<<<<<<< HEAD
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
=======
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
>>>>>>> teste
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

<<<<<<< HEAD
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
=======
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
>>>>>>> teste
    }
}
