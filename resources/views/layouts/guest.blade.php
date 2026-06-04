<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LIORA FRAGRANCE &mdash; Authentication</title>

        <!-- Google Fonts: Cormorant Garamond & Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .font-serif {
                font-family: 'Cormorant Garamond', Georgia, serif;
            }
            .font-sans {
                font-family: 'Inter', system-ui, -apple-system, sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-[#F9F6F0] text-[#2E2C2A] font-sans selection:bg-[#EFEAE2] selection:text-[#2E2C2A]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4 sm:px-0">
            <!-- Branding Header -->
            <div class="mb-8">
                <a href="/" class="text-3xl font-serif tracking-widest font-semibold text-[#2E2C2A] hover:opacity-80 transition duration-200">
                    LIORA FRAGRANCE
                </a>
            </div>

            <!-- Card Container -->
            <div class="w-full sm:max-w-md bg-[#F2EDE4] border border-[#EFEAE2] p-8 md:p-10 shadow-xl rounded-sm">
                {{ $slot }}
            </div>
            
            <!-- Return to Home link -->
            <div class="mt-6">
                <a href="/" class="text-xs uppercase tracking-widest text-[#7A7570] hover:text-[#2E2C2A] transition duration-200 font-medium flex items-center space-x-2">
                    <span>&larr; Return to Home</span>
                </a>
            </div>
        </div>
    </body>
</html>
