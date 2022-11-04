
/* Verifica se a Str é um Json */
function isJSON(str) {
    try {
        return (JSON.parse(str) && !!str);
    } catch (e) {
        return false;
    }
}

/** Hack Dropdown **/
(function() {
    window.addEventListener('shown.bs.dropdown',function(e){
        btn = e.target;
        dropdown = btn.nextElementSibling;
        pos = dropdown.getBoundingClientRect();
        dropdown.position = "fixed";
        dropdown.style.left = pos.left;
        dropdown.style.top = pos.top;
    });

    window.addEventListener('hidden.bs.dropdown',function(e){
        btn = e.target;
        dropdown = btn.nextElementSibling;
        dropdown.position = 'relative';
        dropdown.style.left = 'auto';
        dropdown.style.top = 'auto';
    });

})();
