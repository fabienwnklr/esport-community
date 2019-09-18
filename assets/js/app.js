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

var slideMenu = function () {
    // Déclaration des variables.
    var windowWidth = document.documentElement.clientWidth;
    var body = document.getElementById('body');
    var menuBurger = document.getElementById('header-icon');
    var siteCache = document.getElementById('site-cache');
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