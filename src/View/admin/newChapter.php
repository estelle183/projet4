<?php
ob_start();
?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Nouveau chapitre</h2>
    </div>
<div class="form-group">
<form action="addChapter" method="post">

    <label for="title" class="font-weight-bold">Votre titre</label>
    <input type="text" class="form-control" name="title" required><br/>
    <label for="subtitle" class="font-weight-bold">Votre sous-titre</label>
    <input type="text" class="form-control" name="subtitle" required><br/>
    <label for="content" class="font-weight-bold">Votre contenu</label>
    <textarea name="content" class="form-control" id="mytextarea"></textarea><br/>
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



