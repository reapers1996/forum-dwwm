<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>
<?php include 'includes/navbar.php';?>
<br><br>
    <div>
        <?php 
            foreach($questions as $question){
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="article.php?id=<?= $question->getId(); ?>">
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