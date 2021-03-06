<x-guest-layout>
    <x-slot name="title">
        {{__('E-Kantin')}}
    </x-slot>
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
       
        <!--Nav-->
        @include('layouts.nav-guest')
    
        <div class="relative container mx-auto" style="max-width:1600px;">
           
            <div class="relative overflow-hidden w-full">
                <!--Slide 1-->
                <input class="carousel-open hidden" type="radio" id="carousel-1" name="carousel" aria-hidden="true"  checked="checked">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('{{asset('img/product/carousel.jpg')}}');">
    
                        <div class="container mx-auto">
                            <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                <p class="text-black text-2xl my-4">Ayam Geprek</p>
                                <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                            </div>
                        </div>
    
                    </div>
                </div>
                <label for="carousel-3" class="prev control-1 w-1/4 h-full  absolute cursor-pointer hidden  hover:bg-gray-900 hover:bg-opacity-20 z-10 inset-y-0 left-0">
                    <p class="rounded-full w-10 h-10 ml-2 md:ml-10 bg-white absolute leading-tight text-center text-3xl hover:opacity-100 text-black z-20 inset-y-0 left-0 my-auto"><</p>
                </label>
                <label for="carousel-2" class="next control-1 w-1/4 h-full  absolute cursor-pointer hidden  hover:bg-gray-900 hover:bg-opacity-20 z-10 inset-y-0 right-0">
                    <p class="rounded-full w-10 h-10 mr-2 md:mr-10 bg-white absolute leading-tight text-center text-3xl hover:opacity-100 text-black z-20 inset-y-0 right-0 my-auto">></p>
                </label>
    
                <!--Slide 2-->
                <input class="carousel-open hidden" type="radio" id="carousel-2" name="carousel" aria-hidden="true">
                <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                    <div class="h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="background-image: url('https://images.unsplash.com/photo-1533090161767-e6ffed986c88?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjM0MTM2fQ&auto=format&fit=crop&w=1600&q=80');">
    
                        <div class="container mx-auto">
                            <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                <p class="text-black text-2xl my-4">Real Bamboo Wall Clock</p>
                                <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                            </div>
                        </div>
    
                    </div>
                </div>
                <label for="carousel-1" class="prev control-2 w-1/4 h-full  absolute cursor-pointer hidden  hover:bg-gray-900 hover:bg-opacity-20 z-10 inset-y-0 left-0">
                    <p class="rounded-full w-10 h-10 ml-2 md:ml-10 bg-white absolute leading-tight text-center text-3xl hover:opacity-100 text-black z-20 inset-y-0 left-0 my-auto"><</p>
                </label>
                <label for="carousel-3" class="next control-2 w-1/4 h-full  absolute cursor-pointer hidden  hover:bg-gray-900 hover:bg-opacity-20 z-10 inset-y-0 right-0">
                    <p class="rounded-full w-10 h-10 mr-2 md:mr-10 bg-white absolute leading-tight text-center text-3xl hover:opacity-100 text-black z-20 inset-y-0 right-0 my-auto">></p>
                </label>

                <!--Slide 3-->
                <input class="carousel-open hidden" type="radio" id="carousel-3" name="carousel" aria-hidden="true">
                <div class="carousel-item absolute opacity-0" style="height:50vh;">
                    <div class="h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="background-image: url('https://images.unsplash.com/photo-1519327232521-1ea2c736d34d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">
    
                        <div class="container mx-auto">
                            <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                                <p class="text-black text-2xl my-4">Brown and blue hardbound book</p>
                                <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="#">view product</a>
                            </div>
                        </div>
    
                    </div>
                </div>
                <label for="carousel-2" class="prev control-3 w-1/4 h-full  absolute cursor-pointer hidden  hover:bg-gray-900 hover:bg-opacity-20 z-10 inset-y-0 left-0">
                    <p class="rounded-full w-10 h-10 ml-2 md:ml-10 bg-white absolute leading-tight text-center text-3xl hover:opacity-100 text-black z-20 inset-y-0 left-0 my-auto"><</p>
                </label>
                <label for="carousel-1" class="next control-3 w-1/4 h-full  absolute cursor-pointer hidden  hover:bg-gray-900 hover:bg-opacity-20 z-10 inset-y-0 right-0">
                    <p class="rounded-full w-10 h-10 mr-2 md:mr-10 bg-white absolute leading-tight text-center text-3xl hover:opacity-100 text-black z-20 inset-y-0 right-0 my-auto">></p>
                </label>

                <!-- Add additional indicators for each slide-->
                <ol class="carousel-indicators">
                    <li class="inline-block mr-3">
                        <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                </ol>
    
            </div>
        </div>
        <section class="bg-white py-8">
    
            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
    
                <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
    
                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
                    Store
                        </a>
    
                        <div class="flex items-center" id="store-nav-content">
    
                            <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                                </svg>
                            </a>
    
                            <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                                </svg>
                            </a>
    
                        </div>
                  </div>
                </nav>
                @if ($products->isEmpty())
                    <div class="w-full md:w-full xl:w-full p-6 flex flex-col">
                        <label for="note" class="text-4xl">No product</label>
                    </div>
                @else
                    @foreach ($products as $product)
                    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                        @guest
                            <a href="{{ route('login') }}"></a>
                        @else
                            <a href='product/{{{$product->id}}}/show'>
                        @endguest
                        <img class="hover:grow hover:shadow-lg z-10" src="{{asset('img/product/'.$product->product_photo)}}" :hover>
                            <div class="pt-3 flex items-center justify-between">
                                <p class="">{{$product->product_name}}</p>
                                <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                </svg>
                            </div>
                        <p class="pt-1 text-gray-900">Rp. {{$product->product_price}}</p>
                        </a>
                    </div>
                        
                    @endforeach
                    
                @endif
    
            </div>
    
        </section>
    
        <section class="bg-white py-8">
    
            <div class="container py-8 px-6 mx-auto">
    
                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8" href="#">
                About
            </a>
    
                <p class="mt-8 mb-8">This template is inspired by the stunning nordic minamalist design - in particular:
                    <br>
                    <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/" target="_blank">Savoy Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900" href="https://nordicmade.com/">https://nordicmade.com/</a> and <a class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/" target="_blank">https://www.metricdesign.no/</a></p>
    
                <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in. Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae congue eu consequat ac.</p>
    
            </div>
    
        </section>
    
        <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
            <div class="container flex px-3 py-8 ">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="flex w-full lg:w-1/2 ">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">About</h3>
                            <p class="py-4">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">Social</h3>
                            <ul class="list-reset items-center pt-3">
                                <li>
                                    <a class="inline-block no-underline hover:text-black hover:underline py-1" href="#">Add social links</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    
    </body>
</x-guest-layout>
