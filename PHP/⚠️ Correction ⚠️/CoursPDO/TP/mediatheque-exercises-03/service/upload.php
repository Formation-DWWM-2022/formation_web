<?php

function upload($image)
{
    // Tester si le fichier a été envoyé sans erreur
    if (isset($image) and $image['error'] == 0) {
        // Tester la taille du fichier
        if ($image['size'] <= 1000000) {
            // Tester si l'extension est autorisée
            $infosfichier = pathinfo($image['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                // stocker le fichier définitivement dans le dossier "image"
                move_uploaded_file($image['tmp_name'], 'images/' . basename($image['name']));
                addMessage('success', "L'envoi a bien été effectué !");
            } else {
                addMessage('danger', "Erreur :Extension non autorisée.");
            }
        } else {
            addMessage('danger', "le fichier est trop gros");
        }
    } else {
        addMessage('danger', "Erreur  d'envoi");
    }
}
