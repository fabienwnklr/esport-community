// (function() {
//     var $window = $(window),
//         $body = $('body'),
//         $burger = $('.burger');


//     $('#header-icon').click(function(e) {
//         e.preventDefault();
//         $('body').toggleClass('with-sidebar');
//         $('.site-cache').click(function(e) {
//             $('body').removeClass('with-sidebar');
//             $('.burger').removeClass('cross');
//         })
//     })

//     $('.burger').click(function() {
//         if (!$('.burger').hasClass('cross'))
//             $('.burger').addClass('cross');
//         else
//             $('.burger').removeClass('cross');
//     });


//     function resize() {
//         if ($window.width() > 1050) {
//             $body.removeClass('with-sidebar');
//             $burger.removeClass('cross');
//         }
//     }

//     $window.resize(resize)

// })(jQuery);

// ? Refonte du jquery pour le menu slide en natif
// ! Fonction pour gerer le menu slide

// On déclare les variable dont on a besoin
var windowWidth = document.documentElement.clientWidth;
var body = document.getElementById('body');
var menuBurger = document.getElementById('header-icon');
var siteCache = document.getElementById('site-cache');

var slideMenu = function () {
    // On écoute l'événement sur le burger au clique 
    menuBurger.addEventListener('click', function (event) {
        // preventdefault pour couper le comportement par default (simple précaution)
        event.preventDefault();
        body.classList.toggle('with-sidebar');
        // on écoute l'événement sur siteCache qui permet
        // de fermer le menu en cliquant n'importe ou 
        siteCache.addEventListener('click', function () {
            body.classList.remove('with-sidebar');
            menuBurger.classList.toggle('cross');
        })
    })

    window.onresize = function () {
        if (windowWidth > 1060) {
            body.classList.remove('with-sidebar');
            menuBurger.classList.toggle('cross');
        }
    }

    // On ajoute la class css pour afficher le menu
    menuBurger.addEventListener('click', function () {
        menuBurger.classList.toggle('cross');
    })
}

window.addEventListener('load', slideMenu());


// fonction qui fait appel a une requête ajax pour afficher les différents tournois d'un même jeux
var displayTournamentGame = function (game) {
    $.ajax({
        url: 'http://localhost/php/esport-community/xhr/xhr_home.php',
        method: 'POST',
        data: 'get=selectGame&name=' + game,
        success: function (result) {
            result = $.parseJSON(result);
            console.log(result)
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
                    var platform = result[i].platform

                    content += "<div class='tournoi'>"
                    content += "<a href='#'>";
                    content += "<img src='http://localhost/php/esport-community/assets/img/icon-" + nameForImg + ".png' alt=" + game + ">";
                    content += "<div class='details_tournoi'>";
                    content += "<h4 class='game_name'>" + title + "</h3>";
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

                $('#site-cache').before(content);

            }

        },
        error: function (e) {
            console.error(e)
        }
    });
}

// fonction qui fait appel a une requête ajax pour supprimer un tournoi
var deleteTournament = function (id) {
    confirm('Êtes vous sur de vouloir supprimer définitivement ce tournoi ?')

    if (confirm('Êtes vous sur de vouloir supprimer définitivement ce tournoi ?')) {
        $.ajax({
            url: 'http://localhost/php/esport-community/xhr/xhr_home.php',
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