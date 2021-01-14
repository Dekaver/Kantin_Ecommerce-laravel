<x-guest-layout>
  <x-slot name="title">
    buy
  </x-slot>
  @include('layouts.nav-guest')
  <div class="flex bg-gray-200">
    @include('pages.user.profile-sidebar')
  <main class="bg-gray-300 h-screen">
    <div class="container grid px-6 mx-auto">
      <div class="w-full pt-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-auto max-h-72">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                <th class="px-4 py-3">Product</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Quantity</th>
                <th class="px-4 py-3">Cost</th>
              </tr>
            </thead>
            
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
            >
            @foreach ($purchases as $purchase)
              <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="{{asset('img/product/'.$purchase->product_photo)}}"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">{{$purchase->product_name}}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                          {{$purchase->category}}
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    Rp. <span id='price'>{{$purchase->product_price}}</span>
                  </td>
                  
                  <td class="px-4 py-3 text-xs">
                    
                    <div class="custom-number-input h-10 w-32">
                      
                        <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                          
                          <span>{{$purchase->quantity}}</span>
                      
                      </div>
                    </div>
                    
                  </td>
                  <td class="px-4 py-3 text-xs">
                    
                    <div class="custom-number-input h-10 w-32">
                      
                        <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                          
                          <span>{{$purchase->cost}}</span>
                      
                      </div>
                    </div>
                    
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
  </div>
    <form method="POST" action="{{route('purchase.destroy',Auth::id())}}" enctype="multipart/form-data">
      @csrf
      @method('DELETE')
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
              name="cost" 
              value="0"
              readonly
              id="cost">
            </div>
            <div class="w-1/6">
              <x-auth-validation-errors class="mb-4" :errors="$errors"/>
              <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-purple">
                  {{ __('Purchase Now') }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <script>
      var cost =0;
      var products = {!!json_encode($purchases)!!};
      products.forEach(
        function(item, index){
          cost += item['cost'];
        }
      )
      document.getElementById('cost').value = cost;
    </script>
</x-guest-layout>