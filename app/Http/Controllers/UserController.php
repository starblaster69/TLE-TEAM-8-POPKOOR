<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function edit()
//    {
//        $user = auth()->user();
//        return view('users.edit', compact('user'));
//    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:users',
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        $user = User::find($validated['id']);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();
        return redirect(route('users.edit', $user->id));
    }

    public function destroy(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:users'
            ]);
        User::destroy($validated);
        return redirect('users');
    }

    /** ROLE CHANGES */
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('alert', 'User is succesvol een admin gemaakt.');

        return redirect(route('users'));
    }

    public function verifyGuest(User $user)
    {
        $user->role = 'user';
        $user->save();
        session()->flash('alert', 'User is succesvol geverifieerd.');

        return redirect(route('users'));
    }
}
