<x-guest-layout>
    <x-slot name="title">
        Profile
    </x-slot>
    @include('layouts.nav-guest')
    <div class="flex bg-gray-200">
        @include('pages.user.profile-sidebar')
        <div class="sm:w-5/6 w-full bg-white m-2 rounded-lg p-8">
            <form action="{{route('update_profile',Auth::id())}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full border-b-2 border-gray-600">
                    <h1 class="text-xl font-bold">
                        My Profile
                    </h1>
                    <p>Manage your profile information to control, protect and secure your account</p>
                </div>
                <div class="block w-full md:flex">
                    <table class="block w-full md:w-3/4">
                        <tr>
                            <td>
                                <label for="name">Name</label>
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="name" id="name" value="{{$user->name}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Email</label>
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="email" id="name" value="{{$user->email}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Gender</label>
                            </td>
                            <td>:</td>
                            <td>
                                <select name="gender" id="gender">
                                    <option value="{{$user->gender}}">{{$user->gender}}</option>
                                    @foreach (['male','female'] as $item)
                                        @if ($item != $user->gender)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Address</label>
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="address" id="address" value="{{$user->address}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="name">Birth Day</label>
                            </td>
                            <td>:</td>
                            <td>
                                <input type="date" name="birth_day" id="address" value="{{$user->bitrh_day}}">
                            </td>
                        </tr>
                    </table>
                    <div class="md:block w-1/4 hidden">
                        <label class="grid-cols-1 text-sm justify-center">
                            <div class="flex cursor-pointer justify-center w-full">
                            @if (isset($user->profile_photo))
                                <img id="preview" class="w-60 h-60 rounded-full" src="{{asset('img/user/'.$user->profile_photo)}}" alt="profile" height="100" width="100">
                            @else
                                <img id="preview" class="w-60 h-60 rounded-full" src="https://ui-avatars.com/api/?name={{$user->name}}&color=7F9CF5&background=EBF4FF" alt="profile" height="200" width="200">    
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
                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-purple-500 hover:bg-purple-600 w-full md:w-1/6 py-2">save</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>