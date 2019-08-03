<?php
session_start();
require_once('database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/esport-community/Class/Validate.php');

/**
 * Debug var
 * 
 * @param mixed $content  
 * @return void
 * 
 * @author Fabien Winkler <fabien.winkler@outlook.fr>
 */

function debug($content)
{
    echo '<pre>';
    print_r($content);
    echo '</pre>';
};
/**
 * function for recup game (limit or not)
 *
 * @param string $order
 * @param boolean $nbElement
 * @return void
 */
function gameSelect(string $order = 'DESC', $nbElement = false)
{
    global $db;

    $limit   = (is_int($nbElement)) ? 'LIMIT ' . $nbElement : '';
    $sql     = "SELECT name, image FROM games ORDER BY name $order $limit";
    $request = $db->query($sql);
    $results = $request->fetchAll();

    return $results;
}
/**
 * function for recup all platform
 *
 * @return void
 */
function platformSelect()
{
    global $db;

    $sql     = "SELECT * FROM platforms ORDER BY name";
    $request = $db->query($sql);
    $results = $request->fetchAll();

    return $results;
}

/**
 * Display flash message
 * for display message in html
 */
function flash($link = '', $text = '')
{
    if (!empty($_SESSION['message'])) :
        $content  = '<div class="alert alert-' . $_SESSION['message']['status'] . ' alert-dismissible fade show" role="alert">';
        $content .= $_SESSION['message']['label'];
        $content .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        if ($link !== '' && $text !== '') {
            $content .= '<a href="' . $link . '">' . $text . "</a>";
        }
        $content .= '</div>';
        unset($_SESSION['message']);
        return $content;
    endif;
}

function redirect()
{
    if (isset($_SESSION['redirect'])) :
        header("refresh:3;url=login.php");
    endif;
    unset($_SESSION['redirect']);
}

/**
 * function checkForm for verif 
 * all input for inscription
 * exist and is valid
 * @return void
 */
function checkForm()
{
    if (!empty($_POST)) :
        $validate = new Validate();
        if ($_POST['first-name'] && $_POST['last-name'] && $_POST['email'] && $_POST['password'] && $_POST['password-confirm']) :
            if ($validate->validatePassword($_POST['password'])) :
                if ($_POST['password'] === $_POST['password-confirm']) :
                    if ($validate->email($_POST['email'])) :
                        inscription();
                        $_SESSION['redirect'] = [];
                    else :
                        echo 'email non valide';
                    endif;
                else :
                    echo 'mot de passe pas identique';
                endif;
            else :
                echo 'mot de passe trop simple';
            endif;
        else :
            echo 'Veuillez remplir le formulaire';
        endif;
    endif;
}

/**
 * function inscription for valide 
 * insciption after verification
 * @return void
 */
function inscription()
{
    $data           =  [
        'email'     => $_POST['email'],
        'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'firstname' => $_POST['first-name'],
        'lastname'  => $_POST['last-name']
    ];

    global $db;
    $sql            =  'INSERT INTO users (email, password, firstname, lastname) VALUES (:email,:password,:firstname,:lastname)';
    $request        =  $db->prepare($sql);
    $result         =  $request->execute($data);

    if ($result) :
        $_SESSION['message'] = [
            'label'  => 'Votre compte à bien été créer, vous allez être rediriger dans 3 secondes.',
            'status' => 'success'
        ];
    endif;
}

/**
 * function checkFormTournament
 * form checking all input complete
 *
 * @return void
 */
function checkFormCreateTournament()
{
    if (!empty($_POST)) {
        if ($_POST['name_tournament'] && $_POST['game_selected'] && $_POST['date'] && $_POST['heure'] && $_POST['platform']) {
            createTournament();
        } else {
            $_SESSION['message'] = [
                'label' => 'Veuillez remplir tout les champs.',
                'status' => 'danger'
            ];
        }
    }
}

/**
 * function create tournament
 * for create tournament ..
 *
 * @return void
 */
function createTournament()
{
    $platform = serialize($_POST['platform']);
    $data          =  [
        'name'     => $_POST['name_tournament'],
        'game'     => $_POST['game_selected'],
        'platform' => $platform,
        'date'     => $_POST['date'],
        'heure' => $_POST['heure']
    ];

    global $db;
    $sql            =  'INSERT INTO tournaments (name, game, platform, date, heure) VALUES (:name, :game, :platform, :date, :heure)';
    $request        =  $db->prepare($sql);
    $result         =  $request->execute($data);

    if ($result) {
        $_SESSION['message'] = [
            'label'  => 'Votre tournoi à bien été créer.',
            'status' => 'success'
        ];
    } else {
        $_SESSION['message'] = [
            'label'  => 'Votre tournoi n\'a pas été créer, veuillez contactez un administrateur.',
            'status' => 'danger'
        ];
    }
}

/**
 * function displayTournament
 * for display all tournament
 *
 * @param string $order { default is 'id DESC'}
 * @param boolean $nbElement { default is false }
 * @return void
 */
function displayTournament($order = "id ASC", $nbElement = false)
{
    global $db;
    $limit   = (is_int($nbElement)) ? 'LIMIT ' . $nbElement : '';
    $sql     = "SELECT * FROM tournaments ORDER BY $order $limit";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
}
/**
 * function displayGameTournament
 * for display all tournament where name = name
 *
 * @param string $order { default is 'id DESC'}
 * @param boolean $nbElement { default is false }
 * @return void
 */
function displayGameTournament(string $name)
{
    global $db;
    $sql     = "SELECT * FROM tournaments WHERE game='$name';";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
};

/**
 * function deleteTournament
 *  for delete tournament selected
 * @param integer $id
 * @return void
 */
function deleteTournament(int $id) {
    global $db;
    $sql     = "DELETE FROM tournaments WHERE id=$id;";
    $request = $db->prepare($sql);
    $results = $request->execute();
    return $results;
}