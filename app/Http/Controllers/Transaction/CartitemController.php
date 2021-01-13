<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Cart;



class CartitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = Auth::id();
        $cart = CartItem::select('*')->join('carts', 'carts.id', '=', "cart_id")->where("cart_id", $id)->first();
        $products = CartItem::select([
            'cart_item.id',
            'cart_item.cart_id',
            'cart_item.quantity',
            'cart_item.product_id',
            'products.user_id',
            'products.product_name',
            'products.product_stock',
            'products.product_price',
            'products.product_photo',
            'products.category',
            'products.rating',
        ])->join('carts', 'carts.id', '=', "cart_id")
        ->join('products', 'products.id', '=', 'product_id')
        ->where('carts.user_id',$id)
        ->get();

        return view('pages.cart.create-order-form',compact('cart', 'products'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('pages.admin.cart.create-cart-form');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cart_id = CartItem::where('cart_id', $id)->get('id')->pluck('id')->first();
        $cart_item = CartItem::create([
            'cart_id' => $cart_id,
            'quantity' => 1,
            'product_id' => $request->product_id,
        ]);

        return redirect()
            ->route('user.cart.index', $id);

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
        
        $cart = CartItem::find($id);
        $cart->quantity = $request->get('total');
        // dd($request->get('total'),$id);
        $cart->save();
        return redirect()->route('user.cart.index', $request->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cart = CartItem::find($id);
        $cart->delete();
        return redirect()->route('user.cart.index', $request->user_id);
    }

}
