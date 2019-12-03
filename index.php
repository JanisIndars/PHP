<?php
    require_once("head.php");
    //require('layout/header.php');
?>

<!doctype html>
<html lang="en">
  <head>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <header class="mb-3 bg-primary text-center">
        <h1>RCS</h1>        
    </header>

    <!-- <div class="container"> var iztikt ja main lieto klasi container -->
    
    <main class="mb-3 container">
        <div class="row">
            <div class="col-6">
                <?php //var_dump($_COOKIE);?>
                <?php
                    if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    echo "<div class='alert alert-danger' role='alert'>".$msg."</div>";}
                ?>
                <h1>Ielogotie</h1>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label>Epasta adrese</label>
                        <input name="email" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Parole</label>
                        <input name="pass" type="password" class="form-control"  placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
            <div class="col-6">
                    <?php 
                    if(isset($_GET['error'])){
                        $msg1 = $_GET['error'];
                        echo "<div class='alert alert-danger' role='alert'>".$msg1."</div>";
                    }
                    ?>
                <h1>Reģistrēties</h1>
                <form method="POST" action="store.php">
                    <div class="form-group">
                        <label>Vārds</label>
                        <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Uzvārds</label>
                        <input name="last" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label>Epasta adrese</label>
                        <input name="email" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Parole</label>
                        <input name="pass" type="password" class="form-control"  placeholder="Password">
                         <label>Parole atkārtoti</label>
                        <input name="pass1" type="password" class="form-control"  placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input name="agreement" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Piekrītu noteikumiem</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    <!--</div>-->

<?php require('layout/footer.php'); ?>
