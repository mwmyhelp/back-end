async function tratarErroApi(erro, response, retorno = 'swal'){
    //TODO::APAGAR EM PRODUÇÃO

    console.log(erro);
    console.log(response);
    /** Trata os erros vindo da API da Root, para mostrar alertas **/
    if(!response){
        //Ocorreu um erro, porém não teve uma resposta do servidor.
        chamarErro("Erro na transação com servidor.");
        return true;
    }else{
        //Ocorreu um erro com resposta do servidor.
        var status = response.status;
        var codigo = response.data.codigo;
        var msg = response.data.msg;
        /** Erro de Validação de Campos de Formulários **/
        if(status == 406 && codigo == 'err_val_campo'){
            //HTML
            var html = "<div class='alerta_validacao'>";
            //Percorrer toda a bag de erro e construir HTML para o SweetAlert
            let bag = await response.data.bag;
            Object.entries(bag).forEach(([indice,erros]) => {
                html += "<b class='titulo_campo'> Campo ["+indice+"] :</b>";
                html += "<div class='erros_campo'>";
                erros.forEach(function(erro, id){
                    console.log(id);
                    console.log(erro);
                    html += "<li>"+erro+"</li>";
                });
                html += "</div>";
            });
            html += "</div>";
            //Retornar HTML
            erroValidacao(html);
            return true;
        }
        if(status == 422){
            //HTML
            var html = "<div class='alerta_validacao'>";
            //Percorrer toda a bag de erro e construir HTML para o SweetAlert
            let bag = await response.data.errors;
            Object.entries(bag).forEach(([indice,erros]) => {
                html += "<b class='titulo_campo'>"+indice+":</b>";
                html += "<div class='erros_campo'>";
                erros.forEach(function(erro, id){
                    html += "<li>"+erro+"</li>";
                });
                html += "</div>";
            });
            html += "</div>";
            //Retornar HTML
            if(retorno == 'form'){
                return bag;
            }
            erroValidacao(html);
            return true;
        }
        /** Autenticação **/
        if(status == 401 && response.data.message == "Unauthenticated."){
            //HTML
            Vue.swal({
                ...confVisual,
                ...confErro,
                text: "A sua sessão expirou, efetue login novamente.",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((res) => {
                window.location.href = '/login';
            })
            return true;
        }
        /** Erro Geral **/
        if(status == 500){
            chamarErro(msg);
            return true;
        }

        /** TODO :: Fazer outros tratamentos **/

    }
    //Chegou até aqui é problema.
    chamarErro("Erro desconhecido.");
    return true;

}


