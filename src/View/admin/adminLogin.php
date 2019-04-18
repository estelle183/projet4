<?php
ob_start();
?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../../../public/images/IMG_4084.jpg" class="brand_logo" alt="Logo" width="100px">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="admin-connexion-check" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="pseudo" class="form-control input_user" value="" placeholder="Identifiant" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value="" placeholder="mot de passe" required>
                        </div>


                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="button" class="btn login_btn">Connexion</button>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Mot de passe oublié ? <a href="#">Cliquez ici</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>