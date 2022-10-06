<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
    
        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php 
            foreach($questions as $question){
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="index.php?page=unequestion&id=<?= $question->getId(); ?>">
                            <?= $question->getTitre(); ?>
                        </a>
                    </div>
                    <div class="card-body">
                        <?= $question->getDescription(); ?>
                    </div>
                    <div class="card-footer">
                        Publié par <a href="index.php?page=profil&id=<?= $question->getAuteur()->getId(); ?>"><?= $question->getAuteur()->getPseudo(); ?></a>; 
                    </div>
                </div>
                <br>
                <?php
            }
        ?>

    </div>

</body>
</html>