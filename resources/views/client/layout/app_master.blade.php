<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>

        {{-- Styles Sheet Links --}}
        @include('client.layout.include.style_links')

        {{-- Use Livewire --}}
        @livewireStyles
    </head>
    <body id="page-top" dir="rtl">
        <!-- Navigation-->
        @include('client.layout.include.header')
        <!-- Main Content -->
        <div class="container app-container">
            @yield('content')
        </div>

        <!-- Footer-->
        @include('client.layout.include.footer')

        {{-- Scripts Sheet Links --}}
        @include('client.layout.include.script_links')
        
        {{-- use livewire script --}}
        @livewireScripts
    </body>
</html>
