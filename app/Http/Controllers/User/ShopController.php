<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $shops = Shop::select(
            'shops.id',
            'shops.shop_name',
            'shops.shop_photo',
            'shops.description',
            'shops.status',
            'shops.created_at',
            'shops.updated_at',
            'users.name as seller_name',
        )->join('users', 'users.shop_id', '=', 'shops.id')
        ->paginate(5);
        return view('pages.admin.shop.show-shop',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = User::select(['id','name'])->where('role','user')->where('shop_id',null)->get();
        return view('pages.admin.shop.create-shop-form',compact('sellers'));
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
            'shop_name'=>'required',
            'description' => 'required',
            'shop_photo' => 'image|mimes:jpg,png,jpeg'
        ]);
        if (isset($request->image)){
            $extention = $request->image->extension();
            $image_name = time().'.'.$extention;
            $request->image->move(public_path('img\user\shop'),$image_name);
        }else{
            $image_name = null;
        }

        $shop = Shop::create([
            'shop_name' => $request->shop_name,
            'description' => $request->description,
            'shop_photo' => $image_name,
            'status' => $request->status,
        ]);
        $seller = User::find($request->seller);
        $seller->shop_id = $shop->id;
        $seller->save();

        if (Auth::user()->role === 'admin') {
            return redirect()
                ->route('shop.index')
                ->with('success','Success');
        } else {
            return redirect()
                ->route('dashboard_shop')
                ->with('success','Success');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $shop = Shop::select(
            'shops.id',
            'shops.shop_name',
            'shops.shop_photo',
            'shops.description',
            'shops.created_at',
            'users.name as seller_name',
        )->join('users', 'users.shop_id', '=', 'shops.id')
        ->where('shop_name',$name)
        ->first();
        

        return view('pages.admin.shop.detail-shop', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::select([
            'shops.id',
            'shops.shop_name',
            'shops.shop_photo',
            'shops.description',
            'users.id as seller_id',
            'users.name as seller_name',
        ])->join('users','users.shop_id','=','shops.id')
        ->find($id);
        $sellers = User::select(['id','name'])->where('role','user')->where('shop_id',null)->get();
        return view('pages.admin.shop.edit-shop-form', compact('shop','sellers'));
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
            'shop_name'=>'required',
            'description'=>'required',
            'status' => 'required',
            'shop_photo' => 'image|mimes:jpg,png,jpeg'
        ]);
        $shop = Shop::find($id);

        $shop->shop_name = $request->get('shop_name');
        $shop->description = $request->get('description');
        $shop->status = $request->get('status');
        if (isset($request->image)){
            $image_name = time().'.'.$request->image->extension();
            $request->image->move(public_path('img\user\shop'),$image_name);
            $shop->shop_photo = $image_name;
        }
        $shop->save();
        if ($request->seller !== $request->old_seller_id){
            $seller = User::find($request->old_seller_id);
            $seller->shop_id = null;
            $seller->save();
            $seller = User::find($request->seller);
            $seller->shop_id = $shop->id;
            $seller->save();

        }
        return redirect()->route('shop.index')
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
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('shop.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }

}
