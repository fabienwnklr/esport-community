/**
 * Partie création de tournoi
 */
var inputToReturnValue = document.getElementById('inputToReturnValue');
var previewGame = document.getElementById('preview_game');

/**
 * Fonction pour récuperer la valeur de l'élément cliquer
 * 
 * @param e-event
 */
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
    var dateUS = $(this).val();
        dateFR = dateUS.split('-');
        date = dateFR[2] + '/'+ dateFR[1]+'/' + dateFR[0]
    $('#preview_date').html(date);
});

$('#heure').change(function () {
    $('#preview_heure').html($(this).val());
});



/**
 * Partie suppression 
 * @param id-int du tournoi a supprimer
 */
var deleteTournament = function (id) {
    if (confirm('Êtes vous sur de vouloir supprimer définitivement ce tournoi ?')) {
        $.ajax({
            url: 'http://localhost/esport-community/xhr/xhr_home.php',
            method: 'POST',
            data: 'get=removeTournament&id=' + id,
            success: function (r) {
                document.location.reload();
                var content = "<div class='alert alert-succes alert-dismissible fade show' role='alert'>";
                content += "Votre tournoi à bien été supprimer.";
                content += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                content += "<span aria-hidden='true'>&times;</span>";
                content += "</button>";
                content += "</div>";
                $('#header').after(content)


            },
            error: function (e) {
                console.error(e)
            }
        });
    }
}