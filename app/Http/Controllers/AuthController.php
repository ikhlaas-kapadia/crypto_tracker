<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm () {
        return view('auth.register');
    }
    public function register (Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        // var_dump($request);
        $registeredUser = '';
        try {
           $registeredUser = User::create([
                'first_name' => $request->firstname,
                'last_name' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);            
        } catch (\Illuminate\Database\QueryException $e) {
            
        } catch (\Exception $e) {
            throw new Exception($e);
        }
        
        if($registeredUser) {
            return redirect(route('login'))->with('register-success', 'Registration successful! Please log in.');
        } else {
            return redirect(route('register'))->with('register-error', 'Registration Error');
        }
      


    }
}
