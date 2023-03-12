<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if(auth()->user())
            <meta http-equiv="Refresh" content="0; url='/404'" />
        @else
            <meta http-equiv="Refresh" content="0; url='/register'" />
        @endif
    </head>
    <body class="antialiased">
    </body>
</html>
