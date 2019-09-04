<?php require_once('../includes/functions.php'); ?>
<?php

/**
 * Login to web site
 *
 * @param database $db
 * @return void
 */
function login($db)
{
    $data = ['email' => $_POST['email']];

    $sql     = 'SELECT password, id, firstname, lastname FROM users WHERE email = :email';
    $request = $db->prepare($sql);
    $request->execute($data);
    $result  = $request->fetch();

    // Verif password
    $checkPassword = password_verify($_POST['password'], $result['password']);

    // create new session for store data user
    if ($checkPassword) :
        $_SESSION['auth'] = [
            'id'        => $result['id'],
            'firstname' => $result['firstname'],
            'lastname'  => $result['lastname'],
            'password'  => $result['password'],
        ];
        $_SESSION['message'] = [
            'label' => 'Bienvenue ' . ucfirst($_SESSION['auth']['lastname']) . '',
            'status' => 'success'
        ];
        header('Location: accueil');
        die();
    else :
        $_SESSION['message'] = [
            'label' => 'Un des champs n\'est pas valide.',
            'status' => 'error'
        ];
        return false;
    endif;
}

// Create cookie for persistance login 
// if (isset($_POST['remember'])) :
//     setcookie('user_id', $user->id, time() 3600 * 24 * 3);
// endif;


// Verif if input not empty, and use functio login() 
if (!empty($_POST)) :
    if (!empty($_POST['email']) && !empty($_POST['password'])) :
        if (login($db)) :
            return true;
        else :
            $_SESSION['message'] = [
                'label' => 'Un des champs n\'est pas valide.',
                'status' => 'error'
            ];
        endif;
    endif;
endif;

// debug($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/login.css">
    <link rel="icon" href="http://localhost/php/esport-community/assets/avatar_default/avatar.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Connexion</title>
</head>


<body class="text-center">
    <form method="post" action="connexion" class="form-signin">
            <?= flash() ?>
        <a href="accueil">
            Retour au menu d'accueil
        </a>
        <h1 class="h3 mt-5 mb-3 font-weight-normal">Connexion</h1>
        <label for="email" class="sr-only">Adresse email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Adresse Email" required autofocus>
        <label for="password" class="sr-only">Mot de passe</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox mb-3">
            <label class="checkbox" for="remember">
                <input type="checkbox" for="remember" name="remember" id="remember" value="remember-me"> Se souvenir de moi
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
    </form>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js"><\/script>')
    </script>
    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
</body>

</html>