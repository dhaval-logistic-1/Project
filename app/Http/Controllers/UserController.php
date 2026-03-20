<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {

            $users = User::query();

            if ($request->gender != '') {
                $users->where('gender', $request->gender);
            }

            return DataTables::of($users)

                ->editColumn('date_of_birth', function ($row) {
                    return $row->date_of_birth
                        ? Carbon::parse($row->date_of_birth)->format('d M Y')
                        : '';
                })

                ->addColumn('action', function ($row) {
                    $editUrl = route('users.edit', $row->id);
                    $deleteUrl = route('users.destroy', $row->id);

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>
                        <button data-id="' . $row->id . '" class="btn btn-sm btn-danger deleteBtn">Delete</button>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');


        // $users = User::all();

        // return view('users', compact('users'));
    }


    public function create()
    {
        return view('createuser');
    }

    public function store(Request $request)
    {

        $request->validate([
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'userPassword' => 'required|string|min:8|max:255',
            'userAge' => 'required|integer|min:10|max:50',
            'userDateOfBirth' => 'required|date|before:2015-01-01',
            'userGender' => 'required|in:male,female',
            'userPercentage' => 'required|integer|min:0|max:100',
            'userType' => 'required|in:teacher,student',
        ], [
            'userName.required' => 'User name is required',
            'userEmail.required' => 'Email is required',
            'userPassword.required' => 'Password is required',
            'userAge.required' => 'Age is required',
            'userAge.max' => 'Age must be under 50',
            'userDateOfBirth.required' => 'Date of birth is required',
            'userGender.required' => 'Gender is required',
            'userPercentage.required' => 'Percentage is required',
            'userType.required' => 'User type is required',
        ]);


        $user = new User();

        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->password = Hash::make($request->userPassword);
        $user->age = $request->userAge;
        $user->percentage = $request->userPercentage;
        $user->date_of_birth = $request->userDateOfBirth;
        $user->gender = $request->userGender;
        $user->userType = $request->userType;

        $user->save();

        SendMail::dispatch($user);

        session()->flash('success', 'user created successfully');




        return redirect('/users');
    }




    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // ✅ Validation (same as store, with small changes)
        $request->validate([
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255|unique:users,email,' . $id,
            'userAge' => 'required|integer|min:10|max:50',
            'userDateOfBirth' => 'required|date|before:2015-01-01',
            'userGender' => 'required|in:male,female',
            'userPercentage' => 'required|integer|min:0|max:100',
            'userType' => 'required|in:teacher,student',
        ], [
            'userName.required' => 'User name is required',
            'userEmail.required' => 'Email is required',
            'userAge.required' => 'Age is required',
            'userAge.max' => 'Age must be under 50',
            'userDateOfBirth.required' => 'Date of birth is required',
            'userGender.required' => 'Gender is required',
            'userPercentage.required' => 'Percentage is required',
            'userType.required' => 'User type is required',
        ]);

        // ✅ Update data
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->age = $request->userAge;
        $user->percentage = $request->userPercentage;
        $user->date_of_birth = $request->userDateOfBirth;
        $user->gender = $request->userGender;
        $user->userType = $request->userType;

        // ✅ Optional: update password only if filled
        if ($request->filled('userPassword')) {
            $request->validate([
                'userPassword' => 'min:8|max:255'
            ]);

            $user->password = Hash::make($request->userPassword);
        }

        $user->save();

        return redirect()->route('users.getUsers')
            ->with('success', 'User updated successfully');
    }
}
