    <x-guest-layout>
    <x-slot name="title">
        Profile
    </x-slot>
    @include('layouts.nav-guest')
    <div class="flex bg-gray-200">
        <div class="w-1/6 md:block  hidden p-2 bg-gray-200"> 
            <div class="w-full h-1/6 bg-white rounded-t-lg p-4 flex">
                @if (isset($buyer->profile_photo))
                    <img class="w-8 h-8 rounded-full" src="{{asset('img/profile/'.$buyer->profile_photo)}}" alt="">
                @else
                    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{$buyer->name}}&color=7F9CF5&background=EBF4FF" alt="">
                @endif
                <span>{{$buyer->name}}</span>
            </div>
            <div class="w-full h-5/6 p-4 rounded-b-lg bg-white border-t border-gray-400">
                <ul class="text-lg text-blue-500 font-semibold">
                    <li class="py-3 hover:underline hover:text-blue-600">
                        <a href="user/account/profile">Profile</a>
                    </li>
                    <li class="py-3 hover:underline hover:text-blue-600">
                        <a href="user/account/profile">Order</a>
                    </li>
                    <li class="py-3 hover:underline hover:text-blue-600">
                        <a href="user/account/profile">history</a>
                    </li>
                    <li class="py-3 hover:underline hover:text-blue-600">
                        <a href="seller/create">Open Shop</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sm:w-5/6 w-full bg-white m-2 rounded-lg p-8">
            <form action="{{route('buyer.update',.$buyer->id)}}" method="post">
                <div class="w-full border-b-2 border-gray-600">
                    <h1 class="text-xl font-bold">
                        My Profile
                    </h1>
                    <p>Manage your profile information to control, protect and secure your account</p>
                </div>
                <style>
                    *{
                        border: 1px red solid !important
                    }
                </style>
                <div class="block w-full md:flex">
                    <div class="block w-full md:hidden">
                        <label class="grid-cols-1 text-sm justify-center">
                            <div class="flex cursor-pointer justify-center w-full">
                            @if (isset($buyer->profile_photo))
                                <img id="preview1" class="w-60 h-60 rounded-full" src="{{asset('img/buyer/'.$buyer->profile_photo)}}" alt="profile" height="100" width="100">
                            @else
                                <img id="preview1" class="w-60 h-60 rounded-full" src="https://ui-avatars.com/api/?name={{$buyer->name}}&color=7F9CF5&background=EBF4FF" alt="profile" height="200" width="200">    
                            @endif
                            </div>
                            <input 
                              type="file" 
                              hidden   
                              name="image" 
                              id="image" 
                              onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])">
                              <div class="flex justify-center">
                                  <p class="px-4 py-2 w-2/4 text-center cursor-pointer bg-purple-500 hover:bg-purple-600 rounded-xl font-bold border border-gray-700">Pilih gambar</p>
                              </div>
                          </label>
                    </div>
                    <table class="block w-full md:w-3/4">
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
                        <label class="grid-cols-1 text-sm justify-center">
                            <div class="flex cursor-pointer justify-center w-full">
                            @if (isset($buyer->profile_photo))
                                <img id="preview" class="w-60 h-60 rounded-full" src="{{asset('img/buyer/'.$buyer->profile_photo)}}" alt="profile" height="100" width="100">
                            @else
                                <img id="preview" class="w-60 h-60 rounded-full" src="https://ui-avatars.com/api/?name={{$buyer->name}}&color=7F9CF5&background=EBF4FF" alt="profile" height="200" width="200">    
                            @endif
                            </div>
                            <input 
                              type="file" 
                              hidden   
                              name="image" 
                              id="image" 
                              onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                              <div class="flex justify-center">
                                  <p class="px-4 py-2 w-2/4 text-center cursor-pointer bg-purple-500 hover:bg-purple-600 rounded-xl font-bold border border-gray-700">Pilih gambar</p>
                              </div>
                          </label>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-purple-500 hover:bg-purple-600 w-full md:w-1/6 py-2">save</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>