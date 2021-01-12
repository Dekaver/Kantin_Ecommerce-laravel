<div class="w-1/6 md:block  hidden p-2 bg-gray-200"> 
    <div class="w-full h-1/6 bg-white rounded-t-lg p-4 flex">
        @if (isset(Auth::user()->profile_photo))
            <img class="w-8 h-8 rounded-full" src="{{asset('img/user/'.Auth::user()->profile_photo)}}" alt="">
        @else
            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&color=7F9CF5&background=EBF4FF" alt="">
        @endif
        <span>{{Auth::user()->name}}</span>
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
                @if (isset(Auth::user()->shop_id))
                    <a href="{{route('dashboard_shop')}}">Go Shop</a>
                @else
                
                    <a href="shop/create">Open Shop</a>
                    
                @endif
            </li>
        </ul>
    </div>
</div>