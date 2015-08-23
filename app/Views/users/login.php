<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 30/01/15
 * Time: 18:39
 */
if($errors): ?>
<div class="alert alert-danger">Erreur login</div>
<?endif;?>

<div class="col-lg-6 col-md-offset-3">
    <div class="well bs-component">
        <form class="form-horizontal" method="post">
            <fieldset>
                <legend>Connexion</legend>
                    <?= $form->input('username', 'Pseudo'); ?>
                    <?= $form->input('password', 'Mot de Passe' ,['type' => 'password']); ?>
                    <?= $form->submit('Se connecter'); ?>
            </fieldset>
        </form>
    </div>
</div>



