<?php
ob_start();
?>

    <form action="updateChapter&id=<?= $result->getId()?>" method="post">
        <label for="title" >Votre titre</label>
        <input type="text" name="title" value="<?= $result->getTitle();?>">
        <label for="content">Votre contenu</label>
        <textarea name="content" id="mytextarea"><?= $result->getContent();?></textarea>
        <button type="submit">Valider</button>
    </form>


    <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            language: 'fr_FR',
            width: '80%',
            height: 300
        });
    </script>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>