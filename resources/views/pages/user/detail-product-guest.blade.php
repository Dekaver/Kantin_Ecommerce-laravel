<x-guest-layout>
    <x-slot name="title">
        {{$product->product_name}}
    </x-slot>
    @include('layouts.nav-guest')
    <div class="flex bg-gray-200">
        <div class="flex container">
            <div class="block w-full md:w-1/2 ">
                <img class="float-right py-12" src="{{asset('img/product/'.$product->product_photo)}}" alt="product name" width="300" height="300">
            </div>
            <div class="block w-full md:w-1/2 mr-5 my-5 p-4 rounded-r-md bg-gray-100">
                <div class="flex items-start">
                    @if (isset($product->profile_photo))
                      <img class="w-10 h-10 rounded-full mr-4" src="{{asset('/img/user/'.$product->profile_photo)}}">
                    @else
                      <img class="w-10 h-10 rounded-full mr-4" src="https://ui-avatars.com/api/?name={{$product->name}}&color=7F9CF5&background=EBF4FF">
                    @endif
                    <div class="text-sm">
                      <a href="{{route('shop.show',$product->name)}}" class="leading-none font-bold">{{$product->name}}</a>
                      <p class="text-grey-dark">{{$product->created_at->format('M y')}}</p>
                    </div>
                </div>
                <table class="my-4 ml-4">
                    <tr class="text-lg">
                        <td class="font-semibold">Name</td>
                        <td>  : </td>
                        <td>{{$product->product_name}}</td>
                    </tr>
                    <tr class="text-lg">
                        <td class="font-semibold">Stock</td>
                        <td>  : </td>
                        <td>{{$product->product_stock}}</td>
                    </tr>
                    <tr class="text-lg">
                        <td class="font-semibold">Price</td>
                        <td>  : </td>
                        <td>{{$product->product_price}}</td>
                    </tr>
                    <tr class="text-lg">
                        <td class="font-semibold">Category</td>
                        <td>  : </td>
                        <td>{{$product->category}}</td>
                    </tr>
                </table>
                <form action="{{route('cart.create')}}" method="post">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <button type="submit" class="font-bold text-2xl m-3 bg-yellow-400 rounded-lg px-2 py-1">Add Chart</button>
                </form>
                
            </div>
        </div>
    </div>
</x-guest-layout>