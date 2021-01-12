<x-app-layout>
  @section('title')
      {{_('user')}}
  @endsection
  <div class="py-12">
    <div class="text-4xl font-serif dark:text-gray-200 dark:bg">
      Show Data user
    </div>
    
  </div>
  <div x-data="{ open: false }" class="mb-6">
    <a href="{{route('user.create')}}" class="bg-green-500 rounded-md hover:bg-green-700 text-white font-serif font-bold py-2 px-6">
      Add user
    </a>
  </div>
  <div class="overflow-hidden shadow-xl rounded-lg lg:rounded-md">
    <div class="overflow-x-auto">
      <table class="w-full whitespace-nowrap ">
        <thead >
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800"
            >
            <th class="px-4 py-3">{{__('User')}}</th>
            <th class="px-4 py-3">{{__('Address')}}</th>
            <th class="px-4 py-3">{{__("Gender")}}</th>
            <th class="px-4 py-3">{{__('Birth Day')}}</th>
            <th class="px-4 py-3">{{__('Open Shop')}}</th>
            <th class="px-4 py-3">{{__('Action')}}</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          
          @foreach ($users as $user)
          
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                        >
                        @if (isset($user->profile_photo))
                        <img
                        class="object-cover w-full h-full rounded-full"
                        src="{{asset('img/user/'.$user->profile_photo)}}"
                        alt=""
                        loading="lazy"
                        />
                        @else
                        <img
                        class="object-cover w-full h-full rounded-full"
                        src="https://ui-avatars.com/api/?name={{$user->name}}&color=7F9CF5&background=EBF4FF"
                        alt=""
                        loading="lazy"
                        />
                        @endif
                        <div
                        class="absolute inset-0 rounded-full shadow-inner"
                        aria-hidden="true"
                        ></div>
                    </div>
                    <div>
                      <p>
                        <a class="font-semibold text-gray-900 dark:text-gray-100 hover:text-blue-600" href="/user/{{{$user->id}}}">{{$user->name}}</a>
                      </p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{$user->email}}
                      </p>
                    </div>
                </td>
                <td class="px-4 py-3 text-xs">
                    {{$user->address}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$user->gender}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$user->birth_day}}
                </td>
                <td class="px-4 py-3 text-xs">
                  @if (isset($user->shop_id))
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700  bg-green-100 dark:text-green-100 dark:bg-green-700  rounded-full"
                    >
                    {{__('Yes')}}
                  </span>
                  @else
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-red-700  bg-red-100 dark:text-red-100 dark:bg-red-700 rounded-full"
                    >
                    {{__('No')}}
                  </span>
                  @endif
                </td>
                <td class="px-4 py-3 text-sm">
                  <form action="{{ route('user.destroy',$user->id) }}" method="post">  
                  <a class="bg-green-700 py-1 px-3 hover:bg-green-800 rounded-md text-white" href="{{ route('user.show', $user->id)}}">Show</a>
                  <a class="bg-blue-700 py-1 px-3 hover:bg-blue-800 rounded-md text-white" href="{{ route('user.edit', $user->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-700 py-1 px-3 hover:bg-red-800 text-white rounded-md">Delete</button>
                  </form>
                </td>
            </tr>

          @endforeach
        </tbody>

      </table>
    </div>
    
    {{ $users->links() }}
    
  </div>
  
        


</x-app-layout>

