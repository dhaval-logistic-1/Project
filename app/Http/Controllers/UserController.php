<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
