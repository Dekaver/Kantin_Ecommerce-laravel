<x-app-layout>
  @section('title')
      {{_('New shop')}}
  @endsection
  
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">{{__('Create New shop')}}</h1>
                <form method="POST" action="{{ route('shop.update',$shop->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Email Address -->
                    <input type="hidden" name="old_seller_id" value="{{$shop->seller_id}}">
                    <label class="block text-sm cursor-pointer">
                      <span class="text-gray-700 dark:text-gray-400">Avatar Shop</span>
                      <div class="w-full h-44">
                        @if (isset($shop->shop_photo))
                          <img class="object-contain h-44 w-full" src="{{asset('img/user/shop/'.$shop->shop_photo)}}" id="preview">  
                        @else
                          <img class="object-contain h-44 w-full" src="{{asset('img/upload-image.png')}}" id="preview">
                        @endif
                      </div>
                      <input 
                        class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" 
                        name="image" 
                        id="image"
                        onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Shop Name</span>
                        <input
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          type="text"
                          name="shop_name"
                          value="{{$shop->shop_name}}"
                          placeholder="Shop Name"
                          required autofocus 
                        />
                    </label>
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Description</span>
                      <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="text"
                        name="description"
                        value="{{$shop->description}}"
                        placeholder="Input Your Description"
                        required autofocus 
                        />
                    </label>
                    <label class="block text-sm">
                      <span class="block text-gray-700 dark:text-gray-400">Seller</span>
                      <select name="seller" id="seller" required>
                        <option value="{{$shop->seller_id}}">{{$shop->seller_name}}</option>

                        @if($sellers->isEmpty())
                          <option value="">{{__('No user is ready to become a seller')}}</option>
                        @else
                          @foreach ($sellers as $seller)
                            
                            <option value="{{$seller->id}}">{{$seller->name}}</option>  
                          @endforeach
                        @endif
                      </select>
                    </label>
                    <label class="block text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Status</span>
                        <input 
                          class="rounded-full m-4 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                          name="status" 
                          type="radio" 
                          id="status" 
                          value="open">
                        <p class="inline text-sm  text-gray-700 dark:text-gray-400">Open</p> 
                        <input 
                          class="rounded-full m-4 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                          name="status" 
                          type="radio" 
                          id="status" 
                          value="close"
                          checked>
                        <p class="inline text-sm  text-gray-700 dark:text-gray-400">Close</p> 
                    </label>
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <!-- Button Login -->
                    <div class="flex flex-col md:flex-row-reverse">
                      <button type="submit" class="block m-1 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          {{ __('Save') }}
                      </button>
                      <button type="reset" class="block m-1 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Reset') }}
                      </button>
                      <a href="{{route('shop.index')}}" class="block m-1 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-gray-800 transition-colors duration-150 bg-gray-50 border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('cancel') }}
                      </a>
                    </div>
                </form>    
            </div>
        </div>
    </div>
  </div>
</x-app-layout>