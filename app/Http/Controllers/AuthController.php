<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login', [
            'page' => 'Login',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return redirect(route('login'))->with('failed', "Email or Password does't match!");
    }

    public function registerView()
    {
        return view('auth.register', [
            'page' => 'Register',
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|min:3',
            'email' => 'required|email',
            'number_phone' => 'required',
            'password' => 'required|min:3',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'user';
        $validatedData['id'] = User::latest()->value('id') + 1;

        $register = User::create($validatedData);
        $member = Member::create([
            'users_id' => $validatedData['id'],
        ]);

        if ($register && $member) {
            return redirect(route('login'))->with('success', 'Successfully create an account!');
        } else {
            return redirect(route('login'))->with('failed', 'Failed create an account!');
        }
    }
}
