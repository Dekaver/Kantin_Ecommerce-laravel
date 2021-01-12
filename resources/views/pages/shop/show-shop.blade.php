<x-app-layout>
  @section('title')
      {{_('Seller')}}
  @endsection
  <div class="py-12">
    <div class="text-4xl font-serif dark:text-gray-200 dark:bg">
      Show Data Seller
    </div>
    
  </div>
  <div x-data="{ open: false }" class="mb-6">
    <a href="{{route('seller.create')}}" class="bg-green-500 rounded-md hover:bg-green-700 text-white font-serif font-bold py-2 px-6">
      Add Seller
    </a>
  </div>
  <div class="overflow-hidden shadow-xl rounded-lg lg:rounded-md">
    <div class="overflow-x-auto">
      <table class="w-full whitespace-nowrap ">
        <thead >
          <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-200 dark:text-gray-400 dark:bg-gray-800"
            >
            <th class="px-4 py-3">Seller</th>
            <th class="px-4 py-3">Alamat</th>
            <th class="px-4 py-3">Jenis Kelamin</th>
            <th class="px-4 py-3">Nama Toko</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          
          @foreach ($sellers as $seller)
          
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                        >
                        @if ($seller->profile_photo===null)
                          <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://ui-avatars.com/api/?name={{$seller->name}}&color=7F9CF5&background=EBF4FF"
                          alt=""
                          loading="lazy"
                          />
                        @else
                          <img
                          class="object-cover w-full h-full rounded-full"
                          src="{{asset('img/seller/'.$seller->profile_photo)}}"
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
                        <a class="font-semibold text-gray-900 dark:text-gray-100 hover:text-blue-600" href="/seller/{{{$seller->id}}}">{{$seller->name}}</a>
                      </p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{$seller->email}}
                      </p>
                    </div>
                </td>
                <td class="px-4 py-3 text-xs">
                    {{$seller->address}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$seller->gender}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$seller->shop_name}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight {{$seller->status === 'close' ? 'text-red-700  bg-red-100 dark:text-red-100 dark:bg-red-700' : 'text-green-700  bg-green-100 dark:text-green-100 dark:bg-green-700'}}  rounded-full"
                    >
                    {{$seller->status}}
                  </span>
                  {{-- <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                      >
                        Approved
                      </span> --}}
                </td>
                <td class="px-4 py-3 text-sm">
                  <form action="{{ route('seller.destroy',$seller->name) }}" method="post">  
                    <a class="bg-green-700 py-1 px-3 hover:bg-green-800 rounded-md text-white" href="{{ route('seller.show', $seller->id)}}">Show</a>
                    <a class="bg-blue-700 py-1 px-3 hover:bg-blue-800 rounded-md text-white" href="{{ route('seller.edit', $seller->id)}}">Edit</a>
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
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-200 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <span class="flex items-center col-span-3">
      Showing 21-30 of 100
      </span>
      <span class="col-span-2"></span>
      <!-- Pagination -->
      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
      <nav aria-label="Table navigation">
          <ul class="inline-flex items-center">
          <li>
              <button
              class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
              aria-label="Previous"
              >
              <svg
                  aria-hidden="true"
                  class="w-4 h-4 fill-current"
                  viewBox="0 0 20 20"
              >
                  <path
                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                  ></path>
              </svg>
              </button>
          </li>
          <li>
              <button
              class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
              >
              1
              </button>
          </li>
          <li>
              <button
              class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
              >
              2
              </button>
          </li>
          <li>
              <button
              class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
              >
              3
              </button>
          </li>
          <li>
              <button
              class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
              >
              4
              </button>
          </li>
          <li>
              <span class="px-3 py-1">...</span>
          </li>
          <li>
              <button
              class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
              >
              8
              </button>
          </li>
          <li>
              <button
              class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
              >
              9
              </button>
          </li>
          <li>
              <button
              class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
              aria-label="Next"
              >
              <svg
                  class="w-4 h-4 fill-current"
                  aria-hidden="true"
                  viewBox="0 0 20 20"
              >
                  <path
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"
                  fill-rule="evenodd"
                  ></path>
              </svg>
              </button>
          </li>
          </ul>
      </nav>
      </span>
    </div>
  </div>
  
        


</x-app-layout>

