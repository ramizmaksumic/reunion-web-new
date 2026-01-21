<div x-data="{ selectedImage: null }" class="relative">
    <div class="flex flex-row flex-wrap justify-between gap-3 mt-5 px-5">
        @foreach($images as $image)
        @php
        $url = asset(ltrim($image, '/'));
        @endphp

        <div>
            <img
                src="{{ $url }}"
                alt="Gallery image"
                class="w-40 rounded-xl cursor-pointer hover:opacity-80 transition h-40 object-cover"
                @click="selectedImage = @js($url)">
        </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div
        x-cloak x-show="selectedImage"
        x-show="selectedImage"
        x-transition
        class="fixed inset-0 bg-black/70 flex items-center justify-center z-50">
        <div class="relative">
            <button
                class="absolute top-3 right-3 text-gray-200 text-3xl font-bold cursor-pointer"
                @click="selectedImage = null"
                type="button">
                &times;
            </button>

            <img :src="selectedImage" alt="Selected" class="max-h-screen max-w-screen rounded-lg">
        </div>
    </div>
</div>