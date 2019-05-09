<?php
ob_start();
?>

<div class="container h-100">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Mot de passe oublié ?</h2>
    </div>
    <div class="d-flex justify-content-center h-100" style="padding: 10%">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="public/images/IMG_4084.jpg" class="brand_logo" alt="Logo" width="100px">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="admin-new-password&token=<?= $admin->getToken()?>" method="post">
                    <label for="password">Veuillez saisir votre nouveau mot de passe</label><br/>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_user" value="" placeholder="password" required>
                    </div>
                    <label for="password2">Veuillez ressaisir votre mot de passe </label><br/>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="password" name="password2" class="form-control input_user" value="" placeholder="password" required>
                    </div>

            </div>
            <div class="d-flex justify-content-center mt-3 login_container">
                <button type="submit" name="button" class="btn password_btn">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>
