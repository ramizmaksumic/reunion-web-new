{{-- Flash poruke --}}
@if(session('success'))
<div class="bg-green-200 text-green-800 p-4 rounded-xl mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-200 text-red-800 p-4 rounded-xl mb-4">
    {{ session('error') }}
</div>
@endif

{{-- Validacijske greške --}}
@if ($errors->any())
<div class="bg-red-100 text-red-800 p-4 rounded-xl mb-4">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form id="form" action="{{ route('send.order') }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf

    <div class="flex flex-col md:flex-row gap-5">
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="name" class="font-medium">Ime i prezime</label>
            <input type="text" name="name" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">
        </div>
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="phone" class="font-medium">Telefon</label>
            <input type="phone" name="phone" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">
        </div>

    </div>
    <div class="flex flex-col md:flex-row gap-5 mt-5">
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="adress" class="font-medium">Adresa</label>
            <input type="text" name="adress" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">
        </div>
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="email" class="font-medium">Email</label>
            <input type="email" name="email" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">
        </div>

    </div>
    <div class="flex flex-col md:flex-row gap-5 mt-5">
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="service" class="font-medium">Usluga</label>

            @php
            $categories = App\Models\Category::all();
            @endphp

            <select name="service" id="" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">
                @foreach ($categories as $category )
                <option value="{{ $category->name }}" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">{{ $category->name }}</option>

                @endforeach
            </select>

        </div>
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="date" class="font-medium">Rok isporuke</label>
            <input type="date" name="date" class="bg-secondary py-3 px-10 rounded-xl mt-3 outline-0">
        </div>

    </div>
    <div class="flex flex-col md:flex-row gap-5 mt-5">
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="fileInput" class="font-medium">Ubaci dokument</label>
            <input type="file" name="fileInput" class="bg-secondary file:cursor-pointer file:font-medium  file:py-1 file:px-3 file:rounded-xl file:mr-3 py-3 px-10 rounded-xl mt-3">
        </div>
        <div class="flex flex-col text-xl font-body w-full md:w-1/2">
            <label for="fileInput" class="font-medium">Opiši projekt</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="bg-secondary py-3 px-10 rounded-xl mt-3 focus:outline-none focus:ring-2 focus:ring-primary/40 resize-none"
                placeholder="Napišite kratko šta Vam je potrebno..."></textarea>

        </div>

    </div>
    <div class=" flex flex-col text-xl font-body w-full md:w-1/2">

        <button
            data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"
            data-callback='onSubmit'
            data-action='submit'
            type="submit" class="g-recaptcha bg-primary py-3 mt-10 px-10 rounded-2xl font-heading text-default cursor-pointer">Pošalji &rarr;</button>
    </div>
</form>



<script>
    function onSubmit(token) {
        document.getElementById("form").submit();
    }
</script>