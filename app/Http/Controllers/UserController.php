<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Get search query if exists
        $search = $request->query('search');

        // Fetch users, optionally filtered by search query
        $users = User::when($search, function($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10); // Adjust the number per page as needed

        // Return view with users data
        return view('road.user-management', compact('users'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|string',
        ]));
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
