<?php $title = "Mot de passe oublié"; ?>
<?php
ob_start();
?>

<div class="container h-100">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Changement de mot de passe</h2>
    </div>
    <div class="d-flex justify-content-center h-100" style="padding: 10px">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="public/images/IMG_4084.jpg" class="brand_logo" alt="Logo" width="100px">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="admin-email-check" method="post">
                    <label for="email">Veuillez saisir votre email</label><br/>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control input_pass" value="" placeholder="email" required>
                    </div>
                    <div class="input-group mb-3">


            </div>
            <div class="d-flex justify-content-center mt-3 login_container">
                <button type="submit" name="button" class="btn password_btn">Envoyer</button>
            </div>
                    <div class="alert-success"><?php if (isset($_SESSION['flash'])) {
                            echo $_SESSION['flash'];
                            unset($_SESSION['flash']);
                        } ?></div>
            </form>

        </div>
    </div>
</div>


<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>
