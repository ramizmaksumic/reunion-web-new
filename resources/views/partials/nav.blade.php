<header class="mt-4" x-data="{ open: false }">
    <div class="container mx-auto flex items-center justify-between py-2 md:shadow-xl md:px-5 md:rounded-2xl">
        <!-- Logo -->
        <div>
            <a href="/"><img src="{{ URL::asset('images/logo.png') }}" alt="Reunion logo" class="w-[200px] md:w-[300px]"></a>
        </div>

        <!-- Navigacija (desktop) -->
        <nav class="hidden md:flex">
            <ul class="flex gap-3 font-heading font-bold">
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default {{ (request()->routeIs('o-nama')) ? 'bg-primary text-default' : '' }}"><a href="{{ route('o-nama')}}">O nama</a></li>
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default {{ (request()->routeIs('services')) ? 'bg-primary text-default' : '' }}"><a href="{{ route('services') }}">Usluge</a></li>

                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default {{ (request()->routeIs('portfolio')) ? 'bg-primary text-default' : '' }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default {{ (request()->routeIs('post')) ? 'bg-primary text-default' : '' }}"><a href="{{ route('post') }}">Novosti</a></li>
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default {{ (request()->routeIs('contact')) ? 'bg-primary text-default' : '' }}"><a href="{{ route('contact') }}">Kontakt</a></li>
            </ul>
        </nav>

        <!-- Dugme (desktop) -->
        <div class="hidden md:inline-block">
            <a href="{{ route('digitalni-savjetnik') }}" class="font-heading bg-primary px-8 py-4 rounded-2xl text-default">
                Digitalni savjetnik &rarr;
            </a>
        </div>

        <!-- Hamburger (mobile) -->
        <div class="md:hidden">
            <button @click="open = ! open" class="font-heading px-8 py-4 rounded-2xl text-default cursor-pointer">
                <i class="fa-solid fa-bars text-black text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobilni meni -->
    <div x-show="open" x-transition class="md:hidden">
        <nav>
            <ul class="flex flex-col w-full h-screen gap-3 font-heading font-bold text-center leading-10 px-5">
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default"><a href="{{ route('o-nama') }}">O nama</a></li>
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default"><a href="{{ route('services') }}">Usluge</a></li>

                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default"><a href="{{ route('post') }}">Novosti</a></li>
                <li class="py-2 px-4 hover:bg-primary rounded-xl transition duration-350 hover:text-default"><a href="{{ route('contact') }}">Kontakt</a></li>
                <div class="flex text-center mt-10">
                    <ul class="flex font-heading gap-x-2 text-center mx-auto">
                        <li><a href="" class="hover:text-primary">facebook</a></li>|
                        <li><a href="" class="hover:text-primary">instagram</a></li>|
                        <li><a href="" class="hover:text-primary">linkedIn</a></li>
                    </ul>

                </div>

            </ul>

        </nav>
    </div>
</header>