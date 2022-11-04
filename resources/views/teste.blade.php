<html>
<head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Tester</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>

    <link href="{{asset('plugins/fontAwesome/css/all.min.css')}}" rel="stylesheet"/>

    <!-- Froala -->
    <link href="{{asset('plugins/froala/css/froala_editor.pkgd.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/froala/css/plugins.pkgd.min.css')}}" rel="stylesheet"/>

    <script src="{{asset('plugins/froala/js/froala_editor.pkgd.min.js')}}"></script>
    <script src="{{asset('plugins/froala/js/plugins.pkgd.min.js')}}"></script>
    <script src='{{asset('plugins/froala/js/languages/pt_br.js')}}'></script>

    <style>
        .fr-wrapper div:first-child{
            display: none !important;
        }
    </style>

</head>
<body>
<h1>Oie</h1>
<div id="edit">
    Teste
</div>
<script>

    (function () {
        new FroalaEditor("#edit", {
            enter: FroalaEditor.ENTER_P,
            language: 'pt_br'
        })
    })()

</script>
</body>
</html>
