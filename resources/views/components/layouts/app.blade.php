<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($metaDescription = $meta_description ?? (isset($settings) ? $settings->meta_description : null))
    <meta name="description" content="{{ Str::limit(strip_tags($metaDescription), 160) }}">
    @endif

    <title>{{ $meta_title ?? $title ?? (isset($settings) ? $settings->meta_title : null) ?? config('app.name', 'Адмирал') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    maxWidth: {
                        site: '1440px',
                    },
                    colors: {
                        primary: '#243468',
                        accent: '#ED3200',
                        'accent-dark': '#d62a00',
                        'accent-light': '#f15b33',
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        heading: ['Montserrat', 'ui-sans-serif', 'sans-serif'],
                        serif: ['Playfair Display', 'Georgia', 'Merriweather', 'ui-serif', 'serif'],
                    },
                }
            }
        }
    </script>

    {{-- Google Fonts: Montserrat (основной), Playfair Display (логотип serif) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        /* Swiss patterns (декоративные фоны) — тонкие, низкий контраст */
        .swiss-pattern-dots { background-image: radial-gradient(circle, rgba(15,23,42,.04) 1px, transparent 1px); background-size: 28px 28px; }
        .swiss-pattern-lines { background-image: repeating-linear-gradient(0deg, transparent 0 3px, rgba(15,23,42,.015) 3px, rgba(15,23,42,.015) 4px); }
        .swiss-pattern-diagonal { background-image: repeating-linear-gradient(-45deg, transparent 0 24px, rgba(15,23,42,.012) 24px, rgba(15,23,42,.012) 25px); }
        .swiss-decorative-line { }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    {{ $slot }}
    @stack('scripts')
</body>
</html>
