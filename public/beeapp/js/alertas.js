/** Regras Pré Configuradas para Aleras **/
/** Configuração de Audios **/
const audioGeral = () => {
    var audio = new Audio('/assets/sound/validado.mp3');
    audio.play();
}

const audioSucesso = () => {
    var audio = new Audio('/assets/sound/sucesso.mp3');
    audio.play();
}

const audioErro = () => {
    var audio = new Audio('/assets/sound/erro.mp3');
    audio.play();
}

const audioValidado = () => {
    var audio = new Audio('/assets/sound/validado.mp3');
    audio.play();
}

const audioAlerta = () => {
    var audio = new Audio('/assets/sound/alerta.mp3');
    audio.play();
}

const audioBipe = () => {
    var audio = new Audio('/assets/sound/beep.mp3');
    audio.play();
}

/** Visuais **/
const confVisual = {
    imageUrl: '/beeapp/images/logo-swal-beeapp.png',
    imageAlt: "Logo Sistema",
    confirmButtonColor: "#09346D",
    cancelButtonColor: "#6C0816"
}

/** Tipos **/
const confAviso = {
    icon: 'info',
    willOpen: audioGeral,
    confirmButtonText: "Ok!"
}

const confSucesso = {
    icon: 'success',
    willOpen: audioSucesso,
    confirmButtonText: "Ok!"
}

const confErro = {
    icon: 'error',
    willOpen: audioErro,
    confirmButtonText: "Ok!"
}


/** Chamadas Rápidas **/
function chamarAviso(texto){
    Vue.swal({
        ...confVisual,
        ...confAviso,
        text: texto
    });
}

function chamarSucesso(texto){
    Vue.swal({
        ...confVisual,
        ...confSucesso,
        text: texto
    });
}

function chamarErro(texto){
    Vue.swal({
        ...confVisual,
        ...confErro,
        text: texto
    });
}

function erroValidacao(bag){
    Vue.swal({
        ...confVisual,
        ...confErro,
        confirmButtonText: "Entendido",
        html: bag,
        footer: '<a href="#">Precisa de Ajuda?</a>'
    });
}

/** SweetAlerts Prontos **/
function chatIndisponivel(){
    chamarAviso("Chat Indisponível.");
}

function notificacoesIndisponivel(){
    chamarAviso("Notificações Indisponíveis.");
}

function indisponivel(){
    chamarAviso("Essa ação está indisponível no momento.");
}




