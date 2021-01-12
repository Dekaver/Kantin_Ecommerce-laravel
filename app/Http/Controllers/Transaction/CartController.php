<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Shop;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = Cart::orderBy("name", 'asc')->where('role','user')->paginate(5);
        return view('pages.admin.user.show-user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create-user-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'gender' => 'required',
            'email' => 'required',
            'profile_photo' => 'image|mimes:jpg,png,jpeg'
        ]);
        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\user'),$image_name);
            
        }else{
            $image_name = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt("user1234"),
            'role' => 'user',
            'gender' => $request->gender,
            'address'=>$request->address,
            'birth_day'=>$request->birth_day,
            'profile_photo' => $image_name,
        ]);

        return redirect()
            ->route('user.index')
            ->with('success','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::select(
            'users.id',
            'users.shop_id',
            'users.name',
            'users.email',
            'users.gender',
            'users.address',
            'users.birth_day',
            'users.profile_photo',
            'users.profile_photo',
            'shops.shop_name',
            'shops.shop_photo',
            'shops.created_at',
        )->join('shops', 'shops.id', '=', 'users.shop_id')
        ->find($id);
        

        return view('pages.admin.user.detail-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.admin.user.edit-user-form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('user.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }

}
