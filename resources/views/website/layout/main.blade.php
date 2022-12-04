<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>My First Project</title>
        @include('website.include.stylesheet')
    </head>
    @stack('scopedCss')
    <body>
        @if(!request()->routeIs('assignment.index'))
        @include('website.include.header')
        @endif
        @yield('content')
        @if(!request()->routeIs('assignment.index'))
        @include('website.include.footer')
        @endif
        @include('website.include.script')
        
        @stack('scopedJs')
    </body>
</html>