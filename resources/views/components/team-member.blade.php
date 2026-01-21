@props(['name', 'position', 'image'])


<div>
    <div class="w-full rounded-2xl mb-3">
        <img
            src="{{ $image }}"
            alt="{{ $name }}"
            class="rounded-xl h-120 object-cover w-full">

    </div>
    <div class="flex justify-between">
        <p class="font-bold">{{$name}}</p>
        <p class="font-light">{{$position}}</p>
    </div>
</div>