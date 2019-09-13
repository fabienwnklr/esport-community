var file = 'http://localhost/php/esport-community/xhr/xhr_home.php';

// fonction qui fait appel à une requête ajax pour afficher 
// les différents tournois d'un même jeu dans l'accueil
var displayTournamentGame = function (game) {
    $.ajax({
        url: file,
        method: 'POST',
        data: 'get=selectGame&name=' + game,
        success: function (result) {
            result = $.parseJSON(result);
            // console.log(result)
            var content = "<div class='container_tournois wrapper' >";
            if (result && result.length > 0) {
                $('#error').remove();
                $('#containerGame').empty();
                for (i = 0; i < result.length; i++) {

                    var game = result[i].game;
                    var nameForImg = game.replace(/\s/g, '').toLowerCase();
                    var title = result[i].name;
                    var date = result[i].date;
                    var heure = result[i].heure
                    // var platform = result[i].platform

                    content += "<div class='tournoi'>"
                    content += "<a href='#'>";
                    content += "<img src='assets/img/icon-" + nameForImg + ".png' alt=" + game + ">";
                    content += "<div class='details_tournoi'>";
                    content += "<h4 class='tournament_name'>" + title + "</h3>";
                    content += "<p>" + game + "</p>";
                    content += "<p>Date : " + date + "</p>";
                    content += "<p>Heure du tournoi : <time>" + heure + "</time></p>";
                    content += "</div>";
                    content += "</a>";
                    content += "</div>";
                }

                content += "</div>";

                $('#containerGame').removeClass()
                $('#containerGame').append(content);

            } else {
                content = "<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'>";
                content += "Désolé, il n'y à pas encore de tournois sur ce jeu, créer en un !";
                content += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                content += "<span aria-hidden='true'>&times;</span>";
                content += "</button>";
                content += "</div>";

                $('#error').remove();
                window.scrollTo('', 0);
                $('#site-cache').before(content);

            }

        },
        error: function (e) {
            console.error(e)
        }
    });
}

var searchForm = function () {
    var game = document.getElementById('gameSelected');
    var platform = document.getElementById('platformSelected');
    var name = document.getElementById('nameTournament');

    game.addEventListener('change', function () {
        if (this.value !== '' && typeof this.value != undefined) {
            $.ajax({
                url: file,
                method: 'POST',
                data: 'get=selectGame&name=' + this.value,
                success: function (result) {
                    result = $.parseJSON(result);
                    // console.log(result)
                    var content = "<div class='container_tournois wrapper' >";
                    if (result && result.length > 0) {
                        $('#error').remove();
                        $('#containerGame').empty();
                        for (i = 0; i < result.length; i++) {

                            var game = result[i].game;
                            var nameForImg = game.replace(/\s/g, '').toLowerCase();
                            var title = result[i].name;
                            var date = result[i].date;
                            var heure = result[i].heure;
                            var platform = result[i].platform;

                            content += "<div class='tournoi'>"
                            content += "<a href='#'>";
                            content += "<img src='assets/img/icon-" + nameForImg + ".png' alt=" + game + ">";
                            content += "<div class='details_tournoi'>";
                            content += "<h4 class='tournament_name'>" + title + "</h3>";
                            content += "<p>" + game + "</p>";
                            content += "<p>" + platform + "</p>";
                            content += "<p>Date : " + date + "</p>";
                            content += "<p>Heure du tournoi : <time>" + heure + "</time></p>";
                            content += "</div>";
                            content += "</a>";
                            content += "</div>";
                        }

                        content += "</div>";

                        $('#containerGame').removeClass()
                        $('#containerGame').append(content);

                    } else {
                        content = "<div id='error' class='alert alert-danger alert-dismissible fade show' role='alert'>";
                        content += "Désolé, il n'y à pas encore de tournois sur ce jeu, créer en un !";
                        content += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        content += "<span aria-hidden='true'>&times;</span>";
                        content += "</button>";
                        content += "</div>";

                        $('#error').remove();
                        window.scrollTo('', 0);
                        $('#site-cache').before(content);

                    }
                }
            });
        }
    })


}

searchForm();