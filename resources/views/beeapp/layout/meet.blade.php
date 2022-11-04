<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BeeApp - Gestão Eficiente</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/img/icon.png')}}" type="image/png"/>

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


</head>
<body>
<div class="wrapper">

    @include('beeapp.layout.header',['meet' => true])

    <div class="main-panel">
        <div class="content">
            @yield('conteudo')
        </div>
            @include('beeapp.layout.footer')
    </div>

</div>

@stack('modal')
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

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
@if(session()->has('sucesso'))
    <!-- Avisos -->
    <script>
        $(document).ready(function(){
            Swal.fire({
                position: 'top-end',
                toast: true,
                html: "<div class='ml-4 mr-4'>{{session()->pull('sucesso')}}</div>",
                icon: 'success',
                timer: 1500,
                timerProgressBar: true,
                showConfirmButton: false
            });
        });
    </script>
@endif
@if(session()->has('clicar'))
    <script>
        $(document).ready(function(){
            $('{{session()->pull('clicar')}}').click();
        });
    </script>
@endif

@stack('js')

</body>
</html>
