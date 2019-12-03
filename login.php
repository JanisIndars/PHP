<?php
    require("head.php");

    $email = $_POST['email'];
    $password = hash('sha256', $_POST['pass']);

    if (! validate_email($email)) {
        show_error('Nekorekti ievadīta e-pasta adrese');
    }

    $user = User::get($email);

    if ($user === null) {
        show_error('Lietotājs ar tādu e-pasta adresei neeksistē');
    }

    if (! $user->validPassword($password)) {
        show_error('Nepareiza parole');
    }

    $_SESSION['registered'] = $email;

    header('Location: success.php');

?>
