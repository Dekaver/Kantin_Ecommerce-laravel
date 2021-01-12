<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;

class PageController extends Controller
{
    public function dashboard_admin()
    {
        $products = Product::all();
        $users = User::all();
        return view('pages.admin.dashboard',compact('products', 'users'));
    }

    public function dashboard_shop()
    {   
        $id = Auth::id();
        $products = Product::where('user_id', $id)->get();
        
        $user = User::select("shops.shop_name")
            ->join('shops', 'shops.id', '=', 'shop_id')
            ->find($id);
        $shop_name = $user->shop_name;
        return view('pages.shop.dashboard',compact('products', 'shop_name'));
    }
    
    public function dashboard_guest()
    {
        $products = Product::all();
        
        return view('pages.user.dashboard',compact('products'));
    }

    public function dashboard_user()
    {
        $products = Product::all();
        return view('dashboard',compact('products'));
    }

    public function showProduct($id)
    {
        $product = Product::select([
            'products.id',
            'products.user_id',
            'products.product_name',
            'products.product_price',
            'products.product_stock',
            'products.product_photo',
            'products.category',
            'users.profile_photo',
            'users.created_at',
            'users.name',
            ])
            ->join('users', 'users.id', '=', 'user_id')
            ->find($id);
        return view('pages.user.detail-product-guest', compact('product'));
    } 

}