<x-app-layout>
  @section('title')
      {{_('New user')}}
  @endsection
 
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">{{__('Create New user')}}</h1>
                <form method="POST" action="{{ route('user.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!-- Email Address -->
                    <label class="block text-sm cursor-pointer">
                      <span class="text-gray-700 dark:text-gray-400">Photo Product</span>
                      <div class="w-full h-44">
                        <img class="object-contain h-44 w-full" src="{{asset('img/upload-image.png')}}" id="preview">
                      </div>
                      <input 
                        class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        type="file" 
                        name="image" 
                        id="image"
                        onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          id="nama"
                          type="text"
                          name="name"
                          placeholder="Nama"
                          required autofocus 
                        />
                    </label>
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Email</span>
                      <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Input Your Email"
                        required autofocus 
                        />
                    </label>
                    <label class="block text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Gender</span>
                        <input 
                          class="rounded-full dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                          name="gender" 
                          type="radio" 
                          id="gender" 
                          value="male">
                        <p class="inline text-sm  text-gray-700 dark:text-gray-400">Male</p> 
                        <input 
                          class="rounded-full dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                          name="gender" 
                          type="radio" 
                          id="gender" 
                          value="female">
                        <p class="inline text-sm  text-gray-700 dark:text-gray-400">Female</p> 
                    </label>
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Birth Day</span>
                      <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        id="birth_day"
                        type="date"
                        name="birth_day"
                        />
                    </label>
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">address</span>
                      <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        id="address"
                        type="text"
                        name="address"
                        placeholder="address"
                        />
                    </label>
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <div class="flex flex-col md:flex-row-reverse">
                      <button type="submit" class="block m-1 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          {{ __('Save') }}
                      </button>
                      <button type="reset" class="block m-1 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Reset') }}
                      </button>
                      <a href="{{route('user.index')}}" class="block m-1 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-gray-800 transition-colors duration-150 bg-gray-50 border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-purple-700 hover:text-gray-100 focus:outline-none focus:shadow-outline-purple">
                        {{ __('cancel') }}
                      </a>
                    </div> 
                </form>    
            </div>
        </div>
    </div>
  </div>
</x-app-layout>