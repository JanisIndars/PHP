<?php
    require("head.php");


    $email = $_POST['email'];
    $password = $_POST['pass'];
    $repeat = $_POST['pass1'];
    $name = $_POST['name'];
    $last = $_POST['last'];

    if (! validate_email($email)) {
        show_error('Nekorekti ievadīta e-pasta adrese');
    }
    if($email===NULL && $pass===NULL && $name===NULL && $last===NULL)
    {
        show_error('Lauk nedrīkst būt tukši');
    }
    if ($password !== $repeat) {
        show_error('Paroles nesakrīt');
    }

    if (strlen($password) < 5) {
        show_error('Parole ir par īsu');
    }

    if (! isset($_POST['agreement'])) {
        show_error('Obligāti jāpiekrīt noteikumiem');
    }

    if ($_POST['agreement'] !== 'on') {
        show_error('Obligāti jāpiekrīt noteikumiem');
    }
    $passto=hash('sha256', $password);
    $success = User::insert($email, $passto, $name, $last);
    
    if ($success) {
        $_SESSION['registered'] = $email;
        header('Location: complite.php?success=1');
    } else {
        show_error('Problēma ar datubāzi');
    }

?>
