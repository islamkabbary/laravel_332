<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255' , "min:6"],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ],[
        //     "email.required" => "مينفعش متكتبكش الايميل ياحمادة"
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        Auth::login($user);

        event(new RegisterUserEvent($user));
        // Mail::to($user->email)->queue(new RegisterMail($user));
        return redirect(route('dashboard', absolute: false));
    }
}
