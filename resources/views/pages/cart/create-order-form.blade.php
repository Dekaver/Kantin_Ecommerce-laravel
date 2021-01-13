<x-guest-layout>
  <x-slot name="title">
    buy
  </x-slot>
  @include('layouts.nav-guest')
  <style>
    input[type='number']::-webkit-inner-spin-button,
    input[type='number']::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
  
    <main class="bg-gray-300 h-screen">
    {{-- <input type="hidden" name="buyer_id" value="{{$buyer_id}}">
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="hidden" name="status" value="waiting"> --}}
    <div class="container grid px-6 mx-auto">
      
      <div class="w-full pt-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-auto max-h-84">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                <th class="px-4 py-3">Product</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Quantity</th>
                <th class="px-4 py-3">Action</th>
              </tr>
            </thead>
            
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
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
                        <p class="font-semibold">{{$product->product_name}}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                          {{$product->category}}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    Rp. <span id='price'>{{$product->price}}</span>
                  </td>
                  
                  <td class="px-4 py-3 text-xs">
                    
                    <div class="custom-number-input h-10 w-32">
                      <form action="{{route('cart.update',$product->id)}}" method="post">
                        <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                          @csrf
                          @method("PUT")
                          <input type="hidden" name="user_id" value="{{Auth::id()}}">
                          <button data-action="decrement" type="submit" class="bg-white border border-gray-500 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer">
                            <span class="m-auto text-2xl font-thin">−</span>
                          </button>
                          <input 
                            class="outline-none focus:outline-none text-center w-full bg-white font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" 
                            type="number"   
                            name="total" 
                            value="{{$product->quantity}}"/>
                          <button data-action="increment" type="submit" class="bg-white border border-gray-500 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                            <span class="m-auto text-2xl font-thin">+</span>
                          </button>  
                     
                        </form>
                      </div>
                    </div>
                    
                  </td>
                  <td class="px-4 py-3">
                    <form action="{{route('cart.destroy',$product->id)}}" method="post">
                      @csrf
                      @method("DELETE")
                      <input type="hidden" name="user_id" value="{{Auth::id()}}">
                      <div class="flex items-center space-x-4 text-sm">
                        <button
                          type="submit"
                          class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                          aria-label="Delete"
                        >
                          <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                              clip-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </div>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div
          class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-4 dark:text-gray-400 dark:bg-gray-800"
        >
        <label class="inline items-center dark:text-gray-400">
          <input
            type="checkbox"
            required
            class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          />
          <span class="ml-2">
            I agree to the
            <span class="underline">privacy policy</span>
          </span>
        </label>
    
        </div>
      </div>
    </div>
    </main>
    <form method="POST" action="{{route('user.purchase.create',Auth::id())}}" enctype="multipart/form-data">
      @csrf
      <div class="fixed bottom-0 h-44 md:h-40 w-full p-6 bg-white dark:bg-gray-900">
        <div class="flex">
          <div class="w-1/6"></div>
          <div class="w-2/6">
            <p class="text-4xl">Cost</p>
          </div>
          <div class="w-2/6 text-4xl" >
            Rp. 
            <input 
              class="text-4xl inline w-2/4 border-none" 
              type="text" 
              value="{{$product->price}}"   
              name="cost" 
              id="cost">
              
            </div>
            <div class="w-1/6">
              <x-auth-validation-errors class="mb-4" :errors="$errors"/>
              <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  {{ __('Checkout') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <script>
      function decrement(e) {
        const cost = document.getElementById('cost');
        const btn = e.target.parentNode.parentElement.querySelector(
          'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value--;
        target.value = value;
        cost.value = price*value;
      }
    
      function increment(e) {
        const price = document.getElementById('price').innerHTML;
        const cost = document.getElementById('cost');
        
        const btn = e.target.parentNode.parentElement.querySelector(
          'button[data-action="decrement"]'
        );
        const target = btn.nextElementSibling;
        let value = Number(target.value);
        value++;
        target.value = value;
        cost.value = price*value;
      }
    
      const decrementButtons = document.querySelectorAll(
        `button[data-action="decrement"]`
      );
    
      const incrementButtons = document.querySelectorAll(
        `button[data-action="increment"]`
      );
    
      decrementButtons.forEach(btn => {
        btn.addEventListener("click", decrement);
      });
    
      incrementButtons.forEach(btn => {
        btn.addEventListener("click", increment);
      });

      var buttons = document.querySelectorAll('form button:not([type="submit"])');
      for (i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function(e) {
          e.preventDefault();
        });
      }

    </script>
</x-guest-layout>