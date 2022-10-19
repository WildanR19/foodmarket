<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use PasswordValidationRules;
    public function index()
    {
        $user = User::query()->paginate(10);
        return view('users.index', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        if ($request->file('profile_photo_path')) {
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('assets/user', 'public');
        }
        $data['password'] = Hash::make($request->password);

        User::create($data);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'max:255', 'email', 'unique:users,email,'.$user->id]
        ]);

        $data = $request->all();
        if ($request->file('profile_photo_path')) {
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('assets/user', 'public');
        }
        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
