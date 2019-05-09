<?php $title = "Contact"; ?>
<?php
ob_start ();

?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Formulaire de contact</h2>
    </div>
    <div class="form-group">

<form action="contact-form" method="post" >
    <div class="form-group">
        <label for="name">Nom</label> :
        <input type="text" name="name" id="name" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="email">Email</label> :
        <input type="email" name="email" id="email" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="subject">Sujet</label> :
        <input type="text" name="subject" id="subject" class="form-control" required/>
    </div>
    <div class="form-group">
        <label for="message">Message</label> :
        <textarea name="message" id="message" class="form-control" required></textarea>
    </div>
    <div class="form-group form-check">
        <label class="form-check-label" for="consent">
            <input type="hidden" name="consent" value="0">
            <input type="checkbox" value="1" name="consent" id="consent" class="form-check-input" required/>J'accepte que les données saisies dans ce formulaire soient utilisées pour me contacter dans le cadre de ma demande, conformément à <a href="#">nos mentions légales</a>
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

    </div>

    <div class="alert-success"> <?php if (isset($_SESSION['flash'])) {
            echo $_SESSION['flash'];
            unset($_SESSION['flash']);
        } ?>
    </div>

</div>

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>
