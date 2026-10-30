<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AljabarLearn - Media Pembelajaran Aljabar SMP Kelas VII')</title>

    <!-- CSS Font & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- KaTeX untuk Rumus Matematika Bersih -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">

    <!-- CSS Tema & Layout AljabarLearn -->
    <link rel="stylesheet" href="{{ asset('css/tema.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tata-letak.css') }}">
    <link rel="stylesheet" href="{{ asset('css/guru.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kuis.css') }}">
    <link rel="stylesheet" href="{{ asset('css/evaluasi.css') }}">
    @stack('styles')
</head>
<body>

    @yield('konten')

    <!-- Modal Kamus Istilah (Global) -->
    @include('components.kamus-istilah')

    <!-- KaTeX JS & Auto-render -->
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function jalankanKaTeX() {
                if (typeof renderMathInElement === 'function') {
                    renderMathInElement(document.body, {
                        delimiters: [
                            {left: '$$', right: '$$', display: true},
                            {left: '$', right: '$', display: false}
                        ],
                        throwOnError: false
                    });
                } else {
                    setTimeout(jalankanKaTeX, 100);
                }
            }
            jalankanKaTeX();
        });
    </script>

    <!-- Skrip Utilitas -->
    <script src="{{ asset('js/util-fetch.js') }}"></script>
    <script src="{{ asset('js/kamus-istilah.js') }}"></script>
    @stack('scripts')
    @stack('skrip')
</body>
</html>
