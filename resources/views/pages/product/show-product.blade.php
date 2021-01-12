<x-app-layout>
  <x-slot name="header">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          {{ __('Show product') }}
      </h2>
  </x-slot>
  <div class="py-12">
    <div class="text-4xl font-serif dark:text-gray-200 dark:bg">
      Show Data product
    </div>
  </div>
  <div x-data="{ open: false }" class="mb-6">
    <a href="{{route('shop.product.create',Auth::id())}}" class="bg-green-500 rounded-md hover:bg-green-700 text-white font-serif font-bold py-2 px-6">
      Add product
    </a>
  </div>
  
    <div class="overflow-hidden shadow-xl rounded-lg lg:rounded-md">
      <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap ">
          <thead >
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800"
              >
              <th class="px-4 py-3">Product</th>
              <th class="px-4 py-3">Stock</th>
              <th class="px-4 py-3">Price</th>
              <th class="px-4 py-3">category</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($products as $product)
              <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                          class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                          <img
                          class="object-cover w-full h-full rounded-full"
                          src="{{asset('img/product/'.$product->product_photo)}}"
                          alt=""
                          loading="lazy"
                          />
                          <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                          ></div>
                      </div>
                      <div>
                        <p>
                          <a class="font-semibold text-gray-900 dark:text-gray-100 hover:text-blue-600" href="/product/{{{$product->id}}}">{{$product->product_name}}</a>
                        </p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                          {{$product->rating}}
                        </p>
                      </div>
                  </td>
                  <td class="px-4 py-3 text-xs">
                      {{$product->product_stock}}
                  </td>
                  <td class="px-4 py-3 text-xs">
                    {{$product->product_price}}
                  </td>
                  <td class="px-4 py-3 text-xs">
                    {{$product->category}}
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <form action="{{ route('product.destroy',$product->id) }}" method="post">  
                      @csrf
                      @method('DELETE')
                      <a class="bg-green-700 py-1 px-3 hover:bg-green-800 rounded-md text-white" href="{{ route('product.show', $product->id)}}">Show</a>
                      <a class="bg-blue-700 py-1 px-3 hover:bg-blue-800 rounded-md text-white" href="{{ route('product.edit', $product->id)}}">Edit</a>
                      <button type="submit" class="bg-red-700 py-1 px-3 hover:bg-red-800 text-white rounded-md">Delete</button>
                    </form>
                  </td>
              </tr>

            @endforeach
          </tbody>

        </table>
      </div>
      {!!$products->links()!!}
    </div>
    
        


</x-app-layout>

