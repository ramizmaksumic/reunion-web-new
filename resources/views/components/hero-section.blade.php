<!-- <div>
    <section class="flex flex-col items-center py-32">
        <h1 class="font-heading text-7xl md:text-9xl">Reunion</h1>
        <div class="flex flex-row justify-between text-2xl mt-5 items-center">
            <a href="" class="text-5xl">&larr;</a>
            <p class="font-heading mx-4 text-center">web design & development</p>
            <a href="" class="text-5xl">&rarr;</a>
        </div>
        <a href="/kontakt" class="bg-primary text-default font-heading px-32 py-5 rounded-2xl mt-5">kontaktiraj nas &rarr;</a>

    </section>
</div> -->

<div x-data="slider()">
    <section class="relative overflow-hidden flex flex-col items-center py-32">

        <!-- Background element -->
        <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-primary/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary to-transparent opacity-40"></div>

        <h1 class="font-heading text-7xl md:text-8xl text-center leading-tight">
            Reunion<br>
            <span class="text-primary">web & marketing</span>
        </h1>
        <p class="mt-10 text-xl md:text-2xl max-w-3xl text-center opacity-80">
            Web i digitalna marketing rješenja
            <br>za brendove, organizacije i pojedince

        </p>

        <div class="flex flex-row text-2xl mt-10 items-center">
            <button @click="prev" class="absolute left-8 md:left-160 text-5xl cursor-pointer hover:text-primary">&larr;</button>

            <p class="font-heading mx-auto text-center font-bold" x-text="services[currentIndex]"></p>

            <button @click="next" class="absolute right-8 md:right-160 text-5xl cursor-pointer hover:text-primary">&rarr;</button>
        </div>
        <div class="mt-5 w-48 h-1 bg-secondary rounded-full overflow-hidden">
            <div class="h-full bg-primary transition-all duration-300"
                :style="`width: ${(currentIndex + 1) / services.length * 100}%`"></div>
        </div>

        <a href="/kontakt" class="bg-primary text-default font-heading px-25 md:px-32 py-5 rounded-2xl mt-12 text-xl hover:bg-primary/80">
            Zakaži sastanak &rarr;
        </a>
    </section>
</div>

<script>
    function slider() {
        return {
            services: [
                'Web design',
                'Web development',
                'Digitalni marketing',
                'Google & Meta ads',
                'Foto & video',
                'Branding & Dizajn',
                'PR & Eventi',

            ],
            currentIndex: 0,

            next() {
                if (this.currentIndex < this.services.length - 1) {
                    this.currentIndex++;
                } else {
                    this.currentIndex = 0;
                }
            },
            prev() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                } else {
                    this.currentIndex = this.services.length - 1;
                }
            }
        }
    }
</script>