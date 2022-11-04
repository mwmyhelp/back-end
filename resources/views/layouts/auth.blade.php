<html>
<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="api_url" content="{{config('app.api_url')}}" />
    <title>Bee App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script>
        var api_url = document.querySelector("meta[name='api_url']").getAttribute("content");
        var filesUrl = "{{env('FILES_URL')}}";
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>

    <script src="{{asset('js/login.js')}}"></script>

    <link href="{{asset('css/login.css')}}" rel="stylesheet" />

    <link href="{{asset('plugins/fontAwesome/css/all.min.css')}}" rel="stylesheet" />

</head>
<body>

<div class="hex center hex-principal">
    <div class="hex odd first one"></div>
    <div class="hex odd first three"></div>
    <div class="hex odd first five"></div>
    <div class="hex odd first seven"></div>
    <div class="hex odd first nine"></div>
    <div class="hex odd first eleven"></div>
    <div class="hex odd second one"></div>
    <div class="hex odd second three"></div>
    <div class="hex odd second five"></div>
    <div class="hex odd second seven"></div>
    <div class="hex odd second nine"></div>
    <div class="hex odd second eleven"></div>
    <div class="hex odd third one"></div>
    <div class="hex odd third three"></div>
    <div class="hex odd third five"></div>
    <div class="hex odd third seven"></div>
    <div class="hex odd third nine"></div>
    <div class="hex odd third eleven"></div>
    <div class="hex even first two"></div>
    <div class="hex even first four"></div>
    <div class="hex even first six"></div>
    <div class="hex even first eight"></div>
    <div class="hex even first ten"></div>
    <div class="hex even first twelve"></div>
    <div class="hex even second two"></div>
    <div class="hex even second four"></div>
    <div class="hex even second six"></div>
    <div class="hex even second eight"></div>
    <div class="hex even second ten"></div>
    <div class="hex even second twelve"></div>
</div>


    @yield('conteudo')
</body>
</html>
