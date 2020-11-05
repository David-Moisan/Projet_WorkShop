<!DOCTYPE html>

<?php error_reporting(0); ?>

<html lang="fr">

    <head>
        <title>Formulaire de contact | Green House</title>
        <meta charset="utf-8">
        <style>
            p {
                margin: 0;
                color: #221a1a;
            }
        </style>
    </head>
    <body>

        <?php
            if (isset($_POST['submit'])) {
                $fonction = htmlspecialchars(stripslashes(trim($_POST['fonction'])));
                $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
                $firstname = htmlspecialchars(stripslashes(trim($_POST['firstname'])));
                $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
                $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

                //conditions
                if (!preg_match("/^[A-Za-z . '-]+$/", $fonction)) {
                    $fonction_error = 'Fonction non valide';
                }
                if (!preg_match("/^[A-Za-z . '-]+$/", $name)) {
                    $name_error = 'Nom invalide';
                }
                if (!preg_match("/^[A-Za-z . '-]+$/", $firstname)) {
                    $firstname_error = 'Prénom invalide';
                }
                if (!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)) {
                    $email_error = 'Email invalide';
                }
                if (strlen($message) === 0) {
                    $message_error = 'Aucun message détecté';
                }
            }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-container">
            <div class="row">
                <!-- fonction -->
                <div class="col-12">
                    <div class="form-content">
                        <label for="fonction" class="form-label">
                            Fonction*
                        </label>
                        <input type="text" id="fonction" class="form-input" name="fonction" value="" size="40" aria-required="true">
                        <!-- php -->
                        <p><?php if (isset($fonction_error)) {
            echo $fonction_error;
        } ?></p>
                    </div>
                </div>
                <!-- name -->
                <div class="col-12">
                    <div class="form-content">
                        <label for="name" class="form-label">
                            Nom*
                        </label>
                        <input type="text" id="name" class="form-input" name="name" value="" size="40" aria-required="true">
                        <!-- php -->
                        <p><?php if (isset($name_error)) {
            echo $name_error;
        } ?></p>
                    </div>
                </div>
                <!-- firstname -->
                <div class="col-12">
                    <div class="form-content">
                        <label for="firstname" class="form-label">
                            Prénom*
                        </label>
                        <input type="text" id="firstname" class="form-input" name="firstname" value="" size="40" aria-required="true">
                        <!-- php -->
                        <p><?php if (isset($firstname_error)) {
            echo $firstname_error;
        } ?></p>
                    </div>
                </div>
                <!-- mail -->
                <div class="col-12">
                    <div class="form-content">
                        <label for="email" class="form-label">
                            Email*
                        </label>
                        <input type="email" id="email" class="form-input" name="email" value="" size="40" aria-required="true">
                        <!-- php -->
                        <p><?php if (isset($email_error)) {
            echo $email_error;
        } ?></p>
                    </div>
                </div>
                <!-- message -->
                <div class="col-12">
                    <div class="form-content">
                        <label for="message" class="form-label__message">
                            Votre message*
                        </label>
                        <textarea name="message" id="message" class="form-textarea" cols="40" rows="10" aria-required="true"></textarea>
                        <!-- php -->
                        <p><?php if (isset($message_error)) {
            echo $message_error;
        } ?></p>
                    </div>
                </div>
                <!-- rgpd -->
                <div class="col-12">
                    <div class="form-content">
                        <input type="checkbox" name="check_rgpd" value="1">
                        <span class="rgpd">
                            J'accepte d'être contacté.e par green house dans le cadre de ma demande
                        </span>
                    </div>
                </div>
                <!-- submit -->
                <div class="col-12">
                    <div class="form-content">
                        <button id="submit" class="form-btn" type="submit">
                            ENVOYER
                        </button>
                        <!-- php -->
                        <?php
                            if (isset($_POST['submit']) && !isset($fonction_error) && !isset($name_error) && !isset($firstname_error) && !isset($email_error) && !isset($message_error)) {
                                $to = 'info@greenhouse.fr'; // le mail de l'entreprise est fictif voir avec celui de l'école pour voir si sa fonctionne
                                $body = " Fonction: $fonction\n Nom: $name\n Prénom: $firstname\n Email: $email\n Message: $message\n";
                                if (mail($to, $message, $body)) {
                                    echo '<p style="color: green">Message envoyé</p>';
                                } else {
                                    echo '<p style="color: red">Une erreur a été détectée, réessayer plus tard ! Merci</p>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <!-- obligatoire -->
                <div class="col-12">
                    <div class="form-content">
                        <span class="form-note"><strong>*</strong> champs obligatoires</span>
                    </div>
                </div>
            </div>
        </form>

    </body>

</html>