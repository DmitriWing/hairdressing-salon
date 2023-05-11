<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $roles = $this->roles;
        return view('profile.edit', [
            'user' => $request->user(),
        ], compact('roles'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        // $user->update($request->validated());
        $request->validate([
            'name' => 'required|string|max:255',
            'phone'=>'required|numeric',
            'role' => 'required|string|max:255',
            
        ]);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->role,
            ]);

        // if ($user->isDirty('email')) {
        //     $user->email_verified_at = null;
        // }
        return Redirect::route('profile.edit')->with('status', 'Личные данные изменены');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Update user's avatar
     */
    public function avatarUpd(Request $request): RedirectResponse
    {
        $user = $request->user();
        $data=$request->all();
        if ($request->file('avatar')) {
          $filename = $request->file('avatar')->getClientOriginalName();   // name of image file
          $data['avatar'] = $filename;     // file name for DB has written
          //------------- uploading image  root/images ---------------------
          $file = $request->file('avatar');    // source of initial image
          // uploading image from $file to server
          if ($filename) {
              $file->move('../public/images/avatars', $filename);  // uploading image 
          }
      }else{
          $filename = $request['avatarcurrent'];
      }

      $user->update([
        'avatar' => $filename
        ]);

        return Redirect::route('profile.edit')->with('status', 'Ваш аватар изменен');
    }



}
