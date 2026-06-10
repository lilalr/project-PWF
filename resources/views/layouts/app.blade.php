<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LIORA FRAGRANCE &mdash; Management</title>

        <!-- Google Fonts: Cormorant Garamond & Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            .font-serif {
                font-family: 'Cormorant Garamond', Georgia, serif;
            }
            .font-sans {
                font-family: 'Inter', system-ui, -apple-system, sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-[#F9F6F0] text-[#2E2C2A] selection:bg-[#EFEAE2] selection:text-[#2E2C2A]">
        <div class="min-h-screen flex flex-col justify-between">
            <div>
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-[#F2EDE4] border-b border-[#EFEAE2]">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="py-12">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>

            <!-- Footer -->
            <footer class="py-8 text-center border-t border-[#EFEAE2] bg-[#F2EDE4]/50">
                <p class="text-xs uppercase tracking-widest text-[#7A7570] font-light">
                    &copy; {{ date('Y') }} <span class="font-medium text-[#2E2C2A]">LIORA FRAGRANCE</span>. All rights reserved.
                </p>
            </footer>
        </div>
    </body>
</html>
