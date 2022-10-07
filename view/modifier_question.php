<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <form class="container" method="POST">

        <?php 
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'</p>'; 
            }elseif(isset($successMsg)){ 
                echo '<p>'.$successMsg.'</p>'; 
            }
        ?>
   <input type="hidden" class="form-control" name="id" value="<?= $question->getId()?>">
        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title" value="<?= $question->getTitre()?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description de la question</label>
            <textarea class="form-control" name="description"><?= $question->getDescription()?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea type="text" class="form-control" name="content"><?= $question->getcontenu()?></textarea>
        </div>

        <button type="submit" class="btn btn-warning" name="validate">modifier la question</button>
        <a href="index.php?page=deletequestion&id=<?=$question->getId()?>"><button type="button" class="btn btn-danger" name="delete">supprimer la question</button></a>
   </form>
</body>
</html>
