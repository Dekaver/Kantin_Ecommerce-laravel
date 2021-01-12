

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Show user') }}
    </h2>
  </x-slot>
  <div class="p-2 lg:p-8 w-full block">
    <div class="w-full rounded-t bg-white dark:bg-gray-800 dark:text-white">
      <a href="{{route('user.index')}}">
        <span class="float-right w-5 m-1">
          <svg style="stroke: rgb(150, 58, 238)" viewBox="0 0 20 20">
            
            <path class="text-purple-600" d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z">
              
            </path>
          </svg>
        </span>
      </a>
      <p class="text-xl py-4 px-4 font-bold">Detail user</p>
    </div>
    
    <div class="w-full lg:flex">
      <div class="h-60 lg:h-auto bg-contain p-5 dark:bg-gray-800 dark:text-white bg-white lg:w-64 flex-none lg:rounded-bl overflow-hidden">
        @if (isset($user->profile_photo))
        <img src="{{asset('/img/user/'.$user->profile_photo)}}" class="w-full" alt="profile" srcset="">
        @else
        <img src="https://ui-avatars.com/api/?name={{$user->name}}&color=7F9CF5&background=EBF4FF" class="w-full" alt="profile" srcset="">
        
            
        @endif
      </div>
      <div class="bg-white dark:bg-gray-800 dark:text-white rounded-b lg:rounded-b-none lg:rounded-br lg:w-full p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
          <p class="text-sm text-grey-dark flex items-center">
            <svg class="text-grey w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
            </svg>
            user only
          </p>
          <div class="font-bold text-4xl mb-2">{{$user->name}}</div>
          <p class="text-grey-darker text-base">{{$user->email}}</p>
          <p class="text-grey-darker text-base">{{$user->birth_day}}</p>
          <p class="text-grey-darker text-base">{{$user->gender}}</p>
          <p class="text-grey-darker text-base">{{$user->address}}</p>

        </div>
        <div class="border-2 border-b-2 border-purple-400"></div>
        @if (isset($user->shop_id))
        <p>{{__("Open Shop")}}</p>
        <div class="flex items-start">
          <img class="w-10 h-10 rounded-full mr-4" src="{{asset('/img/user/shop/'.$user->shop_photo)}}">
          <div class="text-sm">
            <a href="{{route('shop.show',$user->shop_name)}}" class="leading-none font-bold">{{$user->shop_name}}</a>
            <p class="text-grey-dark">{{$user->created_at->format('M y')}}</p>
            
          </div>
        @else
          <p class="text-red-400 font-bold">{{__("Not Open Shop")}}</p>
            
        @endif
        </div>
      </div> 
    </div>
  </div>
</x-app-layout>