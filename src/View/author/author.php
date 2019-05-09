<?php $title = "L'auteur"; ?>
<?php
ob_start();
?>
<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Biographie de l'auteur</h2>

    </div>

</div>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>
