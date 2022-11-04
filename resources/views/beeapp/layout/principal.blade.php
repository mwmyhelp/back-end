<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BeeApp - Gestão Eficiente</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/img/icon.png')}}" type="image/png"/>

    <script>
        var filesUrl = "{{env('FILES_URL')}}";
    </script>

    @stack('css')

    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('assets/css/fonts.min.css')}}']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="stylesheet" href="{{asset('plugins/fontAwesome/css/all.min.css')}}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/atlantis.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bee.css')}}">

    @laravelPWA

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--BS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- CK -->
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <!-- Editor -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
</head>
<body>
<div id="main-load" style="text-align: center; position:absolute; width: 100%; height: 100%; background-color: rgba(252,206,45,.7); top:0; left: 0; z-index: 5000;">
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
</div>
<div class="wrapper" id="main-wrapper" style="filter: blur(4px);">

    @include('beeapp.layout.header')

    <div class="main-panel">
        <div class="content">
            @yield('conteudo')
        </div>
            @include('beeapp.layout.footer')
    </div>

</div>

@stack('modal')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<!-- jQuery UI -->
<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>



<!-- jQuery Data Mas -->
<script src="{{asset('js/plugins/datamask/jquery.mask.min.js')}}"></script>
<script src="{{asset('js/plugins/datamask/mascaras.js')}}"></script>
<!-- Atlantis JS -->
<script src="{{asset('assets/js/atlantis.min.js')}}"></script>
<!--- JS do Aplicativo -->
<script src="{{asset('js/main.js')}}"></script>
@if(session()->has('alertaSucesso'))
    <!-- Avisos -->
    <script>
        $(document).ready(function(){
            Swal.fire({
                ...beeSwalVars,
                icon: 'success',
                html: "<div class='ml-4 mr-4'>{{session()->pull('alertaSucesso')}}</div>",
                showConfirmButton: true,
                showCancelButton:false,
                willOpen: () => {
                    somSucesso();
                }
            });
        });
    </script>
@endif

@if(session()->has('alertaErro'))
    <!-- Avisos -->
    <script>
        $(document).ready(function(){
            Swal.fire({
                ...beeSwalVars,
                icon: 'error',
                html: "<div class='ml-4 mr-4'>{{session()->pull('alertaErro')}}</div>",
                showConfirmButton: true,
                showCancelButton:false,
                willOpen: () => {
                    somErro();
                }
            });
        });
    </script>
@endif

@if(session()->has('toastSucesso'))
    <!-- Avisos -->
    <script>
        $(document).ready(function(){
            Swal.fire({
                icon: 'success',
                toast: true,
                html: "<div class='ml-4 mr-4'>{{session()->pull('toastSucesso')}}</div>",
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                willOpen: () => {
                    somSucesso();
                }
            });
        });
    </script>
@endif

@if(session()->has('toastErro'))
    <!-- Avisos -->
    <script>
        $(document).ready(function(){
            Swal.fire({
                icon: 'success',
                toast: true,
                html: "<div class='ml-4 mr-4'>{{session()->pull('toastErro')}}</div>",
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                willOpen: () => {
                    somSucesso();
                }
            });
        });
    </script>
@endif

@if(session()->has('erroValidacao'))
    <script>
        $(document).ready(function(){
            Swal.fire({
                ...beeSwalVars,
                icon: 'error',
                html: "<b>Os seguintes erros foram encontrados:</b>" +
                    @foreach(session()->pull('erroValidacao') as $erro)
                        "<li class='text-danger'>{{(explode("|",$erro)[1])}}</li>"+
                    @endforeach
                    "",
                showConfirmButton: true,
                showCancelButton:false,
                willOpen: () => {
                    somErro();
                }
            });
        });
    </script>
@endif


@stack('js')


</body>
</html>
