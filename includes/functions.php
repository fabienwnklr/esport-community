<?php
session_start();
require_once('database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/esport-community/Class/Validate.php');

// ? Start init functions

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
 * function for recuperate game (limit or not)
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
 * function for recuperate all platform
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
 * inscription after verification
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
            'label'  => 'Votre compte à bien été créer.',
            'status' => 'success'
        ];
    endif;
}


/**
 * function displayTournament
 * for display all tournament
 *
 * @param string $order { default is 'id DESC'}
 * @param boolean $nbElement { default is false }
 * @return void
 */
function displayTournament($nbElement = false)
{
    global $db;
    $limit   = (is_int($nbElement)) ? 'LIMIT ' . $nbElement : '';
    $sql     = "SELECT * FROM tournaments ORDER BY date $limit";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
}

/**
 * function displayGameTournament
 * for display all tournament where name = name
 *
 * @param string $name { name game to display }
 * @return void
 */
function displayGameTournament(string $name)
{
    global $db;
    $sql     = "SELECT * FROM tournaments WHERE game='$name';";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
}

// ? End init functions

// ! Start Fonctions admin 

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
        'heure' => $_POST['heure'],
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
            'label'  => 'Votre tournoi n\'a pas été créer, veuillez contactez un administrateur du site.',
            'status' => 'danger'
        ];
    }
}

/**
 * function deleteTournament
 *  for delete tournament selected
 * @param integer $id
 * @return void
 */
function deleteTournament(int $id)
{
    global $db;
    $sql     = "DELETE FROM tournaments WHERE id=$id;";
    $request = $db->prepare($sql);
    $request->execute();
}

/**
 * function for recuperate user avatar
 *
 * @param integer $id
 * @return void
 */
function userAvatar(int $id)
{
    global $db;
    $sql     = "SELECT avatar FROM users WHERE id='$id';";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
}

/**
 * function for remove user avatar
 *
 * @param integer $id
 * @return void
 */
function removeAvatar(int $id)
{
    global $db;
    $sql     = "UPDATE FROM users SET avatar='' WHERE id='$id';";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
}

/**
 * function for recuperate user data
 *
 * @param integer $id
 * @return void
 */
function userData(int $id)
{
    global $db;
    $sql     = "SELECT * FROM users WHERE id='$id';";
    $request = $db->query($sql);
    $results = $request->fetchAll();
    return $results;
}

/**
 * function editing user infos
 *
 * @param integer $id
 * @return void
 */
function editUserInfos(int $id)
{
    global $db;
    if (isset($_POST['edit_lastname']) && isset($_POST['edit_firstname']) && isset($_POST['edit_email'])) {
        if (!empty($_POST['edit_lastname']) && !empty($_POST['edit_firstname']) && !empty($_POST['edit_email'])) {
            $newLastName = $_POST['edit_lastname'];
            $newFirstName = $_POST['edit_firstname'];
            $newEmail = $_POST['edit_email'];

            $_SESSION['message'] = [
                'label'  => 'Vos informations ont bien été modifier',
                'status' => 'success'
            ];

            $sql     = "UPDATE users SET lastname='$newLastName', firstname='$newFirstName', email='$newEmail' WHERE id='$id';";
            $request = $db->prepare($sql);
            $results = $request->execute();
            return $results;
        } else {
            $_SESSION['message'] = [
                'label'  => 'Veuillez remplir les champs obligatoires',
                'status' => 'danger'
            ];
        }
    }
}

/**
 * function editing avatar
 *
 * @param integer $idUser
 * @return void
 */
function editAvatar(int $idUser)
{
    global $db;
    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        define('MAX_SIZE', 2097152);
        define('MAX_WIDTH', 1200);
        define('MAX_HEIGHT', 1200);
        if (!empty($_FILES['avatar']['name'])) :
            $tabExtentions = ['jpg', 'png', 'jpeg'];
            if (UPLOAD_ERR_OK == ($_FILES['avatar']['error'])) :

                $fileInfos = pathinfo($_FILES['avatar']['name']);

                if (in_array(strtolower($fileInfos['extension']), $tabExtentions)) :
                    $imageInfos = getimagesize($_FILES['avatar']['tmp_name']);
                    if (($imageInfos[0] <= MAX_WIDTH) && ($imageInfos[1] <= MAX_HEIGHT)) :
                        if ((filesize($_FILES['avatar']['tmp_name']) <= MAX_SIZE)) :
                            $imageNom = $_FILES['avatar']['name'];
                            $dossier  = '../assets/avatar_' . $idUser . '/';
                            if (is_dir($dossier)) {
                                if (move_uploaded_file(($_FILES['avatar']['tmp_name']), $dossier . $imageNom)) :
                                    $_SESSION['message'] = [
                                        'label'  => 'Avatar mis à jour.',
                                        'status' => 'success'
                                    ];
                                    $sql     = "UPDATE users SET avatar='$imageNom' WHERE id='$idUser';";
                                    $request = $db->prepare($sql);
                                    $results = $request->execute();
                                    return $results;
                                else :
                                    $_SESSION['message'] = [
                                        'label' => 'Erreur lors de l\'upload.',
                                        'status' => 'danger'
                                    ];
                                endif;
                            } else {
                                mkdir($dossier);
                                if (move_uploaded_file(($_FILES['avatar']['tmp_name']), $dossier . $imageNom)) :
                                    $_SESSION['message'] = [
                                        'label' => 'Avatar mis à jour.',
                                        'status' => 'success'
                                    ];
                                    $sql     = "UPDATE users SET avatar='$imageNom' WHERE id='$idUser';";
                                    $request = $db->prepare($sql);
                                    $results = $request->execute();
                                    return $results;
                                else :
                                    $_SESSION['message'] = [
                                        'label' => 'Erreur lors de l\'upload.',
                                        'status' => 'danger'
                                    ];
                                endif;
                            } else :
                            $_SESSION['message'] = [
                                'label' => 'Image trop lourde.',
                                'status' => 'danger'
                            ];
                        endif;
                    else :
                        $_SESSION['message'] = [
                            'label' => 'Image trop grande.',
                            'status' => 'danger'
                        ];
                    endif;
                else :
                    $_SESSION['message'] = [
                        'label' => 'Merci d\'insérer une image avec une extension valide.',
                        'status' => 'danger'
                    ];
                endif;
            else :
                $_SESSION['message'] = [
                    'label' => 'Erreur inconnu.',
                    'status' => 'danger'
                ];
            endif;
        endif;
    }
}

function editPassword(int $id)
{
    global $db;
    $validate = new Validate();
    if (isset($_POST['actualPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmNewPassword'])) {
        if (!empty($_POST['actualPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmNewPassword'])) {
            $checkPassword = password_verify($_POST['actualPassword'], $_SESSION['auth']['password']);
            if ($checkPassword) {
                if ($validate->validatePassword($_POST['newPassword']) && $_POST['newPassword'] == $_POST['confirmNewPassword']) {
                    $_SESSION['message'] = [
                        "label" => 'Votre mot de passe à bien été modifier.',
                        "status" => "success"
                    ];
                    $newPwd = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                    $sql     = "UPDATE users SET password='$newPwd' WHERE id='$id';";
                    $request = $db->prepare($sql);
                    $request->execute();
                } else {
                    $_SESSION['message'] = [
                        "label" => 'Les nouveaux mots de passe ne sont pas identiques..',
                        "status" => "danger"
                    ];
                }
            } else {
                $_SESSION['message'] = [
                    "label" => 'Mot de passe actuel incorrect.',
                    "status" => "danger"
                ];
            }
        }
    }
}

/**
 * function for delete user account
 *
 * @param integer $id
 * @return void
 */
function deleteUser(int $id)
{
    global $db;

    if (isset($_POST['deleteAccount']) && !empty($_POST['deleteAccount'])) {
        // Verif password
        $checkPassword = password_verify($_POST['deleteAccount'], $_SESSION['auth']['password']);
        if ($checkPassword) {
            $sql     = "DELETE FROM users WHERE id='$id';";
            $request = $db->prepare($sql);
            $request->execute();
            session_destroy();
            header('Location: accueil');
            $_SESSION['message'] = [
                "label" => 'Votre compte a bien été supprimer',
                "status" => "success"
            ];
        } else {
            echo 'Mot de passe incorrect';
        }
    }
}

// ! End Fonctions admin 
