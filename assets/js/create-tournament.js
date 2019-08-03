var inputToReturnValue = document.getElementById('inputToReturnValue');
var previewGame = document.getElementById('preview_game');

// * Fonction pour récuperer la valeur de l'élément cliquer
// * (valeur du alt ici), pour l'entrée directement dans l'input
function returnSelectedGame(e) {
    inputToReturnValue.value = e.alt;
    previewGame.innerText = e.alt;
}


$('#name_tournament').keyup(function () {
    $('#preview_name').html($(this).val());
});

$('input[type="checkbox"]:checked', '#platform').click().each(function () {
    $('#preview_platform').html($(this).val());
})

$('#date').change(function () {
    $('#preview_date').html($(this).val());
});

$('#heure').change(function () {
    $('#preview_heure').html($(this).val());
});

