<?php
    require("head.php");
    require("layout/header.php");

    if (! isset($_SESSION['registered'])) {
        header('Location: index.php');
    }
?>
<div class="row">
   
    <div class="col-6">
        <div class="alert alert-success" role="alert">
            Tu esi Veiksmīgi pieslēdzies! <br />
            
        </div>
    </div>
</div>

<?php require('layout/footer.php'); ?>
