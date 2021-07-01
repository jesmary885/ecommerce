<header class="bg-blue-600 sticky top-0 z-50" x-data="dropdown()">
    <div class="container flex items-center h-16 justify-between md:justify-start">

        {{--Boton de Categorias--}}
        <a x-on:click="show()" 
        :class="{'bg-opacity-100 text-blue-500' : open}"
        class="flex flex-col items-center justify-center order-last md:order-first px-4 bg-white bg-opacity-20 text-gray-300 cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="hidden md:block">Categorías</span>
        </a> 

        {{--logotipo--}}
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto"/>
        </a>

        {{--Barra de busqueda--}}
        <div class="flex-1 hidden md:block ">
            @livewire('search')
        </div>
      
        {{--dropdown de login y register y opciones cuando ya esta iniciada la sesion--}}
        <div class="mx-6 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-gray-300 text-3xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        {{--dropdown del carrito de compras--}}
        
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
        
    </div>

    {{--El contenido del boton Categorias--}}
    <nav id="navigation-menu"
        :class="{'block' : open, 'hidden': !open}"
        class="bg-TrueGray-700 bg-opacity-25 w-full absolute hidden"
        x-show="open">
        {{--menu con pantalla md--}}
        <div class="container h-full hidden md:block"> {{--contenido de menu de categorias--}}
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-TrueGray-500 hover:bg-TrueGray-200 hover:text-blue-500">
                            <a href="{{route('categories.show',$category)}}" class="px-4 py-2 flex items-center">
                                <span class="flex justify-center w-9">
                                    {!!$category->icon!!}
                                </span>
                                {{$category->name}}
                            </a>
                            <div class="bg-gray-100 navigation-submenu absolute w-3/4 h-full right-0 top-0 hidden">
                                <x-navigation-subcategories :category="$category"/>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()"/>
                </div>
            </div>
        </div>
        {{--Menu con pantalla pequeña--}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-gray-200 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                        <li class="text-TrueGray-500 hover:bg-TrueGray-200 hover:text-blue-500">
                            <a href="{{route('categories.show',$category)}}" class="px-4 py-2 flex items-center">
                                <span class="flex justify-center w-9">
                                    {!!$category->icon!!}
                                </span>
                                {{$category->name}}
                            </a>
                            <div class="bg-gray-100 navigation-submenu absolute w-3/4 h-full right-0 top-0 hidden">
                                <x-navigation-subcategories :category="$category"/>
                            </div>
                        </li>
                    @endforeach
            </ul>
            <p class="text-blue-500 px-6 my-2">USUARIOS</p>
            @livewire('cart-mobil')
            {{--Usuario autenticado--}}
            @auth
                <a href="{{ route('profile.show') }}" class="px-4 py-2 flex items-center text-TrueGray-500 hover:bg-TrueGray-200 hover:text-blue-500">
                    <span class="flex justify-center w-9">
                        <i class="far fa-address-card"></i>
                    </span>
                    Profile
                </a>
                <a href="" 
                onclick="event.preventDefault();
                         document.getElementById('Logout_form').submit()"
                class="px-4 py-2 flex items-center text-TrueGray-500 hover:bg-TrueGray-200 hover:text-blue-500">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Log Out
                </a>
                <form id="Logout_form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            {{--Usuario sin autenticar--}}
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 flex items-center text-TrueGray-500 hover:bg-TrueGray-200 hover:text-blue-500">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user"></i>
                    </span>
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 flex items-center text-TrueGray-500 hover:bg-TrueGray-200 hover:text-blue-500">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    Register
                </a>
            @endauth




        </div>
    </nav>
</header>

