<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') . ' - ' . Str::title(Route::currentRouteName()) }}</title>
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
    <script src="{{asset('./js/app.js')}}"></script>
</head>
<body>
    @yield('content')
</body>
</html>
