function getCSRF(){
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}


function chamarLoading(){
    var load = document.getElementById("loadingApp");
    load.classList.remove("d-none");
    var app = document.getElementById('app');
    app.style.filter = 'blur(4px)';
}

function encerrarLoading(){
    var load = document.getElementById("loadingApp");
    load.classList.add("d-none");
    var app = document.getElementById('app');
    app.style.filter = 'none';
}


function tooltips(){
    /** Padrão do BeeApp **/
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
}
