<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\MemberGroup;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user_accounts=User::where('user_type', 'user')->get();

        return view('profile.index',compact('user_accounts'));
    }
    /**
     * Display the user's profile form.
     */
    public function create()
    {
        $member_groups=MemberGroup::pluck('id', 'group_name')->toArray();
        //dd($member_groups);
        return response()->view('profile.form',compact('member_groups'));
    }

    public function edit(Request $request)
    {
        $member_groups=MemberGroup::pluck('id', 'group_name')->toArray();
        return response()->view('profile.form', [
            'user' => $request->user(),
            'member_groups' => $member_groups
        ]);
    }

    public function show(Request $request): View
    {
        return view('profile.form', [
            'user' => $request->user(),
        ]);
    }

    public function members(): View
    {
        $members=User::where('user_type', 'member')->get();

        return view('profile.member',compact('members'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'group_id' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $create = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'group_id' => $request->group_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        if($create) {

            session()->flash('notif.success', 'Member group created successfully!');
            return redirect()->route('profile.index');
        }

        return abort(500);
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
