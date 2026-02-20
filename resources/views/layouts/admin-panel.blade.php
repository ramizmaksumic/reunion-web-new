<!DOCTYPE html>
<html lang="bs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-gray-900 text-gray-100 p-6 space-y-6">
            <h1 class="text-xl font-bold">Reunion Admin</h1>

            <nav class="space-y-2 text-sm">
                <a href="/admin" class="block hover:text-white">Dashboard</a>
                <a href="/admin" class="block hover:text-white">Postovi</a>
            </nav>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="mt-6 bg-gray-800 px-4 py-2 rounded w-full">
                    Odjavi se
                </button>
            </form>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-1 p-10">
            {{ $slot }}
        </main>

    </div>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        let quill;

        document.addEventListener("DOMContentLoaded", function() {

            const editor = document.getElementById('editor');
            if (!editor) return;

            quill = new Quill('#editor', {
                theme: 'snow'
            });

        });

        function savePost() {

            const html = quill.root.innerHTML;

            Livewire.first().set('body', html);
            Livewire.first().call('save');

        }
    </script>

    @livewireScripts
</body>

</html>