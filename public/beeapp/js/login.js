
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function IsEmail(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function digitarSenha(){
    var email = $('#email').val();

    $('#email').removeClass('is-invalid');
    $('#carregando_login').removeClass('d-none');

    if(IsEmail(email)){
        $.post('/auth/consultar',{'email' : email},function(data){
            if(data.status == 'ok'){


                if(data.foto == null || data.foto == ''){
                    data.foto = "https://via.placeholder.com/150/000000/FFFFFF/?text=BeeUser";
                }else{
                    data.foto = filesUrl+data.foto;
                }

                $('#render-foto').empty();
                $('#render-foto').html('<svg viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">\n' +
                    '<defs>\n' +
                    '<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">\n' +
                    '<image xlink:href="'+data.foto+'" x="-25" width="150" height="100" />\n' +
                    '</pattern>\n' +
                    '</defs>\n' +
                    '<polygon points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)" style="stroke-width:4; stroke:rgb(251,199,15);"/>\n' +
                    '</svg>');

                $('#render-nome').empty();
                $('#render-nome').html('Olá '+data.nome);

                $('#usuario').slideUp(300,function(){
                    $('#senha').slideDown(300);
                    $('#password').focus();
                });
            }else{
                $('#email-erro').html('E-mail não encontrado.');
                $('#email').addClass('is-invalid');
            }
        }).fail(function() {
            $('#email-erro').html('Erro na requisição.');
            $('#email').addClass('is-invalid');
        });
    }else{
        $('#email-erro').html('Informe um e-mail válido.');
        $('#email').addClass('is-invalid');
    }

    $('#carregando_login').addClass('d-none');
}

function enviarForm(){
    var senha = $('#password').val();
    var email = $('#email').val();

    $('#password').removeClass('is-invalid');
    $('#carregando_senha').removeClass('d-none');

    if(senha.length <= 5){
        $('#senha-erro').html('Senha inválida.');
        $('#password').addClass('is-invalid');
    }else{
        $.post('/auth/consultar?hash=true',{'email' : email, 'psw' : senha},function(data){
            if(data.status == 'ok'){

                //Abrir solicitação do Bearer Token
                var form = new FormData();
                form.append("email", email);
                form.append("password", senha);

                var settings = {
                    "url": api_url+"logar",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Accept": "application/json",
                    },
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form
                };

                $.ajax(settings).done(function (response) {
                    data = JSON.parse(response);
                    if(data.status == 'sucesso'){
                        btk = data.dados.access_token;
                        $('#btk').val(btk);
                        $('#form-final').submit();
                    }
                });
            }else{
                $('#senha-erro').html('A senha esta errada.');
                $('#password').addClass('is-invalid');
            }
        }).fail(function() {
            $('#senha-erro').html('Erro na requisição.');
            $('#password').addClass('is-invalid');
        });
    }

    $('#carregando_senha').addClass('d-none');
}

$(document).ready(function(){

    $('#email').on('keydown',function(e){
        var key = e.which || e.keyCode;
        if (key == 13) {
            digitarSenha();
        }
    });

    $('#password').on('keydown',function(e){
        var key = e.which || e.keyCode;
        if (key == 13) {
            enviarForm();
        }
    });

});
