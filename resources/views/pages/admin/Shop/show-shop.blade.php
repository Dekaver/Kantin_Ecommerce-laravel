<x-app-layout>
  @section('title')
      {{_('shop')}}
  @endsection
  <div class="py-12">
    <div class="text-4xl font-serif dark:text-gray-200 dark:bg">
      Show Data shop
    </div>
    
  </div>
  <div x-data="{ open: false }" class="mb-6">
    <a href="{{route('shop.create')}}" class="bg-green-500 rounded-md hover:bg-green-700 text-white font-serif font-bold py-2 px-6">
      Add shop
    </a>
  </div>
  <div class="overflow-hidden shadow-xl rounded-lg lg:rounded-md">
    <div class="overflow-x-auto">
      <table class="w-full whitespace-nowrap ">
        <thead >
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800"
            >
            <th class="px-4 py-3">{{__('Avatar')}}</th>
            <th class="px-4 py-3">{{__('Shop Name')}}</th>
            <th class="px-4 py-3">{{__("Description")}}</th>
            <th class="px-4 py-3">{{__('Seller')}}</th>
            <th class="px-4 py-3">{{__('Status')}}</th>
            <th class="px-4 py-3">{{__('Action')}}</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          
          @foreach ($shops as $shop)
          
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                        >
                        <img
                        class="object-cover w-full h-full rounded-full"
                        src="{{asset('img/user/shop/'.$shop->shop_photo)}}"
                        alt=""
                        loading="lazy"
                        />
                        <div
                        class="absolute inset-0 rounded-full shadow-inner"
                        aria-hidden="true"
                        ></div>
                    </div>
                </td>
                <td class="px-4 py-3 text-xs">
                    {{$shop->shop_name}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$shop->description}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$shop->seller_name}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight {{$shop->status==='open'?'text-green-700  bg-green-100' : 'text-red-700  bg-red-100'}} rounded-full"
                    >
                    {{$shop->status}}
                  </span>
                </td>
                <td class="px-4 py-3 text-sm">
                  <form action="{{ route('shop.destroy',$shop->id) }}" method="post">  
                  <a class="bg-green-700 py-1 px-3 hover:bg-green-800 rounded-md text-white" href="{{ route('shop.show', $shop->shop_name)}}">Show</a>
                  <a class="bg-blue-700 py-1 px-3 hover:bg-blue-800 rounded-md text-white" href="{{ route('shop.edit', $shop->id)}}">Edit</a>
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
    
    {{ $shops->links() }}
    
  </div>
</x-app-layout>

