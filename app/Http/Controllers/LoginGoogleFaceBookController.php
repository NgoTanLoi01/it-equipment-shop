<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class LoginGoogleFaceBookController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $customer = Socialite::driver('google')->user();

            $finduser = Customer::where('google_id', $customer->id)->first();

            if ($finduser) {
                // Lưu thông tin người dùng vào session
                session(['customer_id' => $finduser->customer_id]);
                session(['user' => $finduser]);
            } else {
                $newUser = Customer::create([
                    'customer_name' => $customer->getName(),
                    'customer_email' => $customer->getEmail(),
                    'google_id' => $customer->getId(),
                    'customer_phone' => null,
                    'customer_password' => null
                ]);

                // Lưu thông tin người dùng mới vào session
                session(['customer_id' => $newUser->customer_id]);
                session(['user' => $newUser]);
            }

            return redirect()->intended('/');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
