<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Shop;

class PurchaseController extends Controller
{
    public function index($id)
    {
        $purchases = Purchase::join('products', 'products.id', '=', 'product_id')->where('purchases.user_id', $id)->get();
        return view('pages\purchase\show-purchase', compact('purchases'));
    }

    public function store(Request $request, $id)
    {
        $cart_item = Cart::join('cart_item', 'cart_item.cart_id', '=', 'carts.id')->join('products', 'products.id', '=', 'product_id')->where('carts.user_id', $id)->get(['product_price', 'products.id as product_id', 'quantity']);
        
        foreach ( $cart_item as $product) {
            $product_cost = $product->product_price;
            $product_quantity = $product->quantity;
            $cost = $product_cost * $product_quantity;
            Purchase::create([
                'user_id' => $id,
                'product_id' => $product->product_id,
                'quantity' => $product->quantity,
                'cost' => $cost,
            ]);
        }

        return redirect()
            ->route('user.purchase.index', $id);
    }


    public function destroy(Request $request, $id)
    {
        $purchase_id = Purchase::where('user_id', $id);
        $purchase_id->delete();
        foreach($purchase_id as $id){
            $purchase = Purchase::find($id);
            $purchase->delete();
        }
        
        return redirect()->route('user.purchase.index', $id);
    }
    
}
