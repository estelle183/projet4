<?php
ob_start();
?>

<form action="addChapter" method="post">
    <label for="title">Votre titre</label>
    <input type="text" name="title">
    <label for="content">Votre contenu</label>
    <textarea name="content" id="mytextarea"></textarea>
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



