<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $users = User::query();

            if ($request->gender != '') {

                $users->where('gender', $request->gender);
                
            }

            return DataTables::of($users)->make(true);
        }

        return view('users');

        // $users = User::all();

        // return view('users', compact('users'));
    }
}
