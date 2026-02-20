<div class="">

    <section class="flex flex-col items-center py-16 md:py-32 px-5 text-center">

        <h1 class="font-heading leading-tight
                   text-6xl sm:text-4xl md:text-7xl lg:text-8xl
                   break-words">
            {{ $title }}
        </h1>

        <p class="font-heading mt-6 md:mt-8
                  text-base sm:text-lg md:text-2xl
                  opacity-80 max-w-3xl">
            {{ $description }}
        </p>

        <div class="mt-6 md:mt-8 max-w-full">
            <span class="font-heading text-sm sm:text-base md:text-xl
                         break-words">
                <a href="/" class="text-primary hover:underline">Home</a>
                <span class="mx-2">&rarr;</span>
                {{ $title }}
            </span>
        </div>
    </section>
</div>