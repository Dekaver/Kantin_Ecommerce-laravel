<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{

    public function show()
    {
        $user = User::find(Auth::id());
        return view('pages.user.profile-user-show', compact('user'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'gender' => 'required',
            'email' => 'required',
            'profile_photo' => 'image|mimes:jpg,png,jpeg'
        ]);
        $user = User::find($id);
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->gender = $request->get('gender');
        $user->address = $request->get('address');
        $user->birth_day = $request->get('birth_day');
        if (isset($request->image)){
            $image_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('img\user'),$image_name);
            $user->profile_photo = $image_name;
        }
        $user->save();
        return redirect()->route('profile')
                         ->with('success', 'Data berhasil diupdate');
    }
    public function openShop()
    {   
        $user = User::find(Auth::id());
        return view('pages.user.profile-openshop-form', compact('user'));
    }
}
