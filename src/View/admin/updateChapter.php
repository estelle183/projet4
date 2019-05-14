<?php
ob_start();
?>
    <div class="container">
        <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
            <img src="public/images/heading.jpg" class="heading-logo" width="100px">
            <h2 class="heading-title">Modifier le chapitre</h2>
        </div>
    <div class="form-group">
    <form action="updateChapter" method="post">
        <input type="text" value="<?= $result->getId()?>" name="id" required hidden>
        <label for="title" class="font-weight-bold">Votre titre</label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($result->getTitle());?>"><br/>
        <label for="subtitle" class="font-weight-bold">Votre sous-titre</label>
        <input type="text" name="subtitle" class="form-control" value="<?= htmlspecialchars($result->getSubtitle());?>"> <br/>
        <label for="content" class="font-weight-bold">Votre contenu</label>
        <textarea name="content" id="mytextarea"><?= $result->getContent();?></textarea><br/>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>


    <script src="vendor/tinymce/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            language: 'fr_FR',
            width: '100%',
            height: 500
        });
    </script>
    </div>
    </div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>