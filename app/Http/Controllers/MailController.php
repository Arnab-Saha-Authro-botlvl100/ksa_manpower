<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Demomail; // Make sure this namespace is correct
use Illuminate\Support\Facades\Log; // Import the Log facade

class MailController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        try {
            session_start();
            $randomString = rand(100000, 999999);
            $_SESSION['random_code'] = $randomString;
            $_SESSION['requested_email'] = $request->email;
            $mailData = [
                'title' => 'Mail From Visa Application Form Platform',
                'body'  => 'Password Reset Code',
                'code'  => $randomString,
            ];

            Mail::to($request->email)->send(new DemoMail($mailData));
            return view('resetpass.match');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Email sending error: ' . $e->getMessage());

            // Return a response indicating the error to the user
            return response()->view('errors.email_send', [], 500); // You need to create the corresponding view
        }
    }
}
