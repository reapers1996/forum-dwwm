<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }

            if(isset($questions)){

                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user->getPseudo(); ?></h4>
                        <hr>
                        <p><?= $user->getPrenom() . ' ' . $user->getNom(); ?></p>
                    </div>
                </div>
                <br>
                <?php
                foreach($questions as $question){ 
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $question->getTitre(); ?>
                        </div>
                        <div class="card-body">
                            <?= $question->getDescription(); ?>
                        </div>
                        <div class="card-footer">
                            Par <?= $question->getAuteur()->getPseudo(); ?>
                        </div>
                    </div>
                    <br>
                    <?php
                }

            }
        ?>  
    </div>

</body>
</html>