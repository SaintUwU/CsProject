<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    public function show()
    {
        return view('lockscreen');
    }

    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if (Hash::check($request->password, Auth::user()->password)) {
            session(['locked' => false]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'Incorrect password.']);
    }

}

