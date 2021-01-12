<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    
    public function index($id)
    {
        $products = Product::select([
            'products.id',
            'products.user_id',
            'products.product_name',
            'products.product_stock',
            'products.product_price',
            'products.product_photo',
            'products.category',
            'products.rating',
            'users.name',
            'shops.shop_name',
        ])
        ->join('users', 'users.id', '=', 'user_id')
        ->join('shops', 'shops.id', '=', 'shop_id')
        ->where('user_id',$id)
        ->paginate(10);
        return view('pages.product.show-product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create-product-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {   
        $request->validate([
            'product_name'=>'required',
            'product_stock'=>'required',
            'product_price' => 'required',
            'category'=>'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        $image_name = time().'.'.$request->image->extension();

        $request->image->move(public_path('img\product'),$image_name);
        
        $product = Product::create([
            'user_id' => $user_id,
            'product_name' => $request->product_name,
            'product_stock' => $request->product_stock,
            'product_price' => $request->product_price,
            'product_photo' => $image_name,
            'category'=>$request->category,
        ]);
        
        return redirect()->route('shop.product.index', $user_id)
                         ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        return view('pages.product.detail-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('pages.product.edit-product-form', compact('product'));
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
            'stock'=>'required',
            'price' => 'required',
            'category'=>'required',
            'image' => '|image|mimes:jpg,png,jpeg'
            ]);

        $product = Product::find($id);
        if (isset($request->image)){
            $image_name = time().'.'.$request->image->extension();
            
            $request->image->move(public_path('img\product'),$image_name);
            $product->product_photo = $image_name;

        }
        $product->product_name = $request->get('name');
        $product->product_price = $request->get('price');
        $product->product_stock = $request->get('stock');
        $product->category = $request->get('category');
        $product->save();

        return redirect()->route('shop.product.index',$product->user_id)
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
        $product = Product::find($id);
        $user_id = $product->user_id;

        $image_path = public_path("img/product/{$product->product_photo}");
        if (File::exists($image_path)) {
            unlink($image_path);
        };
        $product->delete();
        
        return redirect()->route('shop.product.index', $user_id)
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}
