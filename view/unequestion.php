<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">


        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }


            if(isset($question)){
                ?>
                <section class="show-content">
                    <h2><?= $question->getTitre(); ?></h2>
                    <hr>
                    <h4><?= $question->getDescription(); ?></h4>
                    <hr>
                    <p><?= $question->getContenu(); ?></p>
                    <hr>
                    <small><a href="profile.php?id='<?=$question->getAuteur()->getId()?>"><?=$question->getAuteur()->getPseudo()?></a></small>
                </section>
                <br>
                <section class="show-answers">

                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Réponse :</label>
                            <textarea name="contenu" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        </div>
                    </form>

                    <?php 
                        foreach($answers as $answer){
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="index.php?page=profil&id=<?= $answer->getAuteur()->getId(); ?>">
                                        <?= $answer->getAuteur()->getPseudo(); ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <?= $answer->getContenu(); ?>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    ?>

                </section>
                
                <?php
            }
        ?>

    </div>

</body>
</html>