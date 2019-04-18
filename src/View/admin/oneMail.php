<?php
ob_start();
?>

<div class="container">

    <h1><?= $result->getName(); ?></h1>
    <h2><?= $result->getSubject(); ?></h2>
    <p>Envoyé le <?= $result->getDateSend(); ?></p>
    <p><?= $result->getMessage(); ?></p>



</div>

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>
