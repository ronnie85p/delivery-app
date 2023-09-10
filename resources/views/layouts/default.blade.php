<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>{!! $head !!}</head>
    <body>
        <header class="page-header p-2 text-white">
            <div class="container mx-auto">{!! $header !!}</div>
        </header>

        <section class="bg-light py-2">
            <div class="container mx-auto">
                <h1 class="h4">{{ $title }}</h1>
            </div>
        </section>

        <section class="page-content mt-3">

            <div class="container mx-auto">
                {!! $content !!}
            </div>
        </section>

        <footer class="page-footer">
            <div class="container-xl mx-auto">{!! $footer !!}</div>
        </footer>
    </body>
</html>
