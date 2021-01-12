<x-guest-layout>
    <x-slot name="title">
      buy
    </x-slot>
    @include('layouts.nav-guest')
    <form method="POST" action="#">
        @csrf
        <main class="bg-gray-300 h-96">
            <div class="container grid px-6 mx-auto">
                <div class="w-full pt-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                        <th class="px-4 py-3">order</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Seller</th>
                        <th class="px-4 py-3">Kuantitas</th>
                        <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                        <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div
                                class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                            >
                                <img
                                class="object-cover w-full h-full rounded-full"
                                src="{{asset('img/order/'.$order->image_url)}}"
                                alt=""
                                loading="lazy"
                                />
                                <div
                                class="absolute inset-0 rounded-full shadow-inner"
                                aria-hidden="true"
                                ></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{$order->name}}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{$order->category}}
                                </p>
                            </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Rp. <span id='price'>{{$order->price}}</span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span>{{$order->seller_name}}</span><br>
                            <span>{{$order->shop_name}}</span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span>{{$order->total}}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete"
                            >
                                <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                >
                                <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                                </svg>
                                <span>Bayar</span>
                            </button>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </main>
    </form>
</x-guest-layout>