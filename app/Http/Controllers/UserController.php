<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Testimonials;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(): Response
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return response()->view('dashboard.users.listUsers', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create(): Response
    {
        $roles = $this->roles;
        return response()->view('dashboard.users.addUser', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //------- validation
      $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required',
        // 'phone'=>'required|numeric'
      ]);
      //------------ work with image file
      $data = $request->all();
      if ($request->hasFile('avatar')) {
        $filename = $request->file('avatar')->getClientOriginalName();
        $data['avatar'] = $filename;
        $file = $request->file('avatar');
        if ($filename) {
          $file->move('../public/images/avatars', $filename);
        }
      }
      $data['password'] = Hash::make($data['password']);

      //-------------- create user to DB
      User::create($data);

        return redirect('/listUsers');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $roles = $this->roles;
        return response()->view('dashboard.users.editUser', compact('roles', 'user'));
    }

    /**
     * Update the user in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
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

      $request->validate([
          'name' => 'required|string|max:255',
          
      ]);

      if ($request->password) {   // if password has been changed
          $request->validate([
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required'
          ]);
          $user->update([
          'name' => $request->name,
          'password' => Hash::make($request->password),
          'role' => $request->role,
          'avatar' => $filename
          ]);
      }else{
          $user->update([
          'name' => $request->name,
          'role' => $request->role,
          'avatar' => $filename,
          'phone' => $request->phone
          ]);
      }
      return redirect('/listUsers');
    }

    /**
     * put datetime to column deleted_at
     *
     */ 
    public function clear (User $user){
        User::where('id', $user->id)
        ->update(['deleted_at' => Carbon::now()]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
    // Check if the category is related to any gallery records
    $commentsCount = $user->comments()->count();

    // Check if the category is related to any service records
    $testimonialsCount = $user->testimonials()->count();

    if ($commentsCount > 0 || $testimonialsCount > 0) {
        // If the category is related to any records, soft-delete it
        $user->delete();
    } else {
        // If the category is not related to any records, delete it
        $user->forceDelete();
    }

    return redirect()->back();
    }
}
