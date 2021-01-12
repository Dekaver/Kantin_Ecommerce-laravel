<x-guest-layout>
    <x-slot name="title">
        Profile
    </x-slot>
    @include('layouts.nav-guest')
    <div class="flex bg-gray-200">
        <div class="w-1/6 md:block  hidden p-2 bg-gray-200">
            <div class="w-full h-1/6 bg-white rounded-t-lg p-4">
            <img height="10" width="10" src="{{asset('img/profile/'.$buyer->image_url)}}" alt="">
                <span>{{$buyer->name}}</span>
            </div>
            <div class="w-full h-5/6 rounded-b-lg bg-white border-t border-gray-400">
                ok
            </div>
        </div>
        <div class="sm:w-5/6 w-full bg-white m-2 rounded-lg p-8">
            <div class="w-full border-b-2 border-gray-600">
                <h1 class="text-xl font-bold">
                    My Profile
                </h1>
                <p>Manage your profile information to control, protect and secure your account</p>
            </div>
            {{-- <style>
                *{
                    border: 1px red solid !important
                }
            </style> --}}
            <div class="flex  w-full">
                <table class="block w-full md:w-3/4">
                    <div class="block w-full md:hidden">
                        <div class="p-10 w-full">
                            
                            <img class="w-full rounded-lg" src="{{asset('img/buyer/'.$buyer->image_url)}}" alt="profile" height="100" width="100">
                        </div>
                    </div>
                    <tr>
                        <td>
                            <label for="name">Name</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="name" id="name" value="{{$buyer->name}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Email</label>
                        </td>
                        <td>:</td>
                        <td>
                            <span class="">{{$buyer->email}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Gender</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="gender" id="gender" value="{{$buyer->gender}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Address</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="address" id="address" value="{{$buyer->address}}">
                        </td>
                    </tr>
                </table>
                <div class="md:block w-1/4 hidden">
                    <label class="block text-sm cursor-pointer">
                        <span class="text-gray-700 dark:text-gray-400">Photo Product</span>
                        <div class="w-full h-44">
                          <img class="object-contain h-44 w-full" src="{{asset('img/upload-image.png')}}" id="preview">
                        </div>
                        <input 
                          class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                          type="file" 
                          {{-- style="display: none" --}}
                          name="image" 
                          id="image" 
                          onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                      </label>
                      <button type="button" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 border border-gray-700">Pilih gambar</button>
                    <div class="">
                        <img src="{{asset('img/buyer/'.$buyer->image_url)}}" alt="profile" height="100" width="100">
                    </div>
                </div>
            </div>
        </div>
        

    </div>
</x-guest-layout>