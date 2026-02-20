<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">




    <title>Reunion web & marketing agencija</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    <!-- Styles / Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>


    @livewireStyles
</head>

<body class="">
    <div class="">
        {{$slot}}



    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Fade-in kad se stranica učita
            document.body.classList.add("loaded");

            // Pronađi sve linkove (osim anchor linkova i onih koji otvaraju u novom tabu)
            const links = document.querySelectorAll("a:not([target='_blank']):not([href^='#'])");

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const href = this.href;

                    // Fade-out
                    document.body.classList.remove("loaded");

                    // Sačekaj dok animacija završi pa idi na novi link
                    setTimeout(() => {
                        window.location = href;
                    }, 100); // isto kao duration-300
                });
            });
        });
    </script>

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