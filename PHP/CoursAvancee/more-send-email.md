## Envoyer des emails [27min] -> Q/R

<https://www.youtube.com/watch?v=SXKzTjxXW88>

L’envoi de messages électroniques est très courant pour une application Web, par exemple, l’envoi d’un courriel de bienvenue lorsqu’un utilisateur crée un compte sur votre site Web, l’envoi de bulletins d’information à vos utilisateurs enregistrés, ou le simple formulaire de contact du site Web, et ainsi de suite.

Vous pouvez utiliser la fonction PHP intégrée mail() pour créer et envoyer des messages électroniques à un ou plusieurs destinataires dynamiquement à partir de votre application PHP, soit en texte clair, soit en HTML formaté. La syntaxe de base de cette fonction peut être donnée avec :

```php
mail(to, subject, message, headers, parameters)
```

Le tableau suivant résume les paramètres de cette fonction :
| Paramètres | Descriptions
| --- | ---
| to | L’adresse e-mail du destinataire.
| subject | Sujet de l’email à envoyer.
| message | Définit le message à envoyer. Chaque ligne doit être séparée par un saut de ligne-LF (n). Les lignes ne doivent pas dépasser 70 caractères.
| headers (optionel) | Ceci est typiquement utilisé pour ajouter des en-têtes supplémentaires tels que « From », « Cc », « Cc », « Bcc ». Les en-têtes supplémentaires devraient être séparés par un retour chariot plus un saut de ligne-CRLF (rn).
| parameters (optionel) | Utilisé pour passer des paramètres supplémentaires.

## Envoi d’emails en texte brut

La façon la plus simple d’envoyer un email avec PHP est d’envoyer un email en texte brut. Dans l’exemple ci-dessous, nous déclarons d’abord les variables, l’adresse email du destinataire, la ligne objet et le corps du message puis nous passons ces variables à la fonction mail() pour l’envoyer.

```php
<?php
$to = 'johndoe@email.com';
$subject="Lorem Ipsum";
$message="Hi, Lorem Ipsum?"; 
$from = 'toto@email.com';

// Envoi d'email
if(mail($to, $subject, $message)){
    echo 'Votre message a été envoyé avec succès!';
} else{
    echo 'Impossible d'envoyer des emails. Veuillez réessayer.';
}
?>
```

### Envoi d’emails au format HTML

Lorsque vous envoyez un message texte en PHP, tout le contenu sera traité comme du texte simple. Nous allons améliorer ce résultat et transformer l’e-mail en un e-mail au format HTML.

Pour envoyer un courriel HTML, le processus sera le même. Cependant, cette fois, nous devons fournir des en-têtes supplémentaires ainsi qu’un message au format HTML.

```php
<?php
$to = 'johndoe@email.com';
$subject="Lorem Ipsum";
$from = 'toto@email.com';

// Pour envoyer du courrier HTML, l'en-tête Content-type doit être défini.
$headers="MIME-Version: 1.0" . "rn";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "rn";

// Créer les en-têtes de courriel
$headers .= 'From: '.$from."rn".
    'Reply-To: '.$from."rn" .
    'X-Mailer: PHP/' . phpversion();

// Composer un simple message électronique HTML
$message="<html><body>";
$message .= '<h1>Salut John!</h1>';
$message .= '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin efficitur, velit quis eleifend fringilla, urna lectus finibus est, ut aliquam nulla tellus vel ipsum. Pellentesque in vulputate leo, sit amet mattis sem. Sed id gravida turpis, et luctus augue. Ut vitae ipsum volutpat, cursus dui sit amet, egestas mi. Etiam bibendum, dolor in sollicitudin facilisis, diam odio ultricies ligula, sit amet rutrum diam justo at eros. Nam mollis efficitur vestibulum. Aenean mi enim, tempus et ornare et, convallis vitae odio. Aliquam tincidunt, massa hendrerit volutpat faucibus, nulla erat lobortis nulla, vitae egestas lectus est sit amet nibh. Ut pretium ligula non risus sollicitudin, porta laoreet sem viverra. Praesent vulputate purus massa, vitae luctus nunc rutrum quis. Vestibulum dignissim semper urna, in rhoncus tortor. Quisque volutpat massa nisl, sit amet elementum nibh lobortis id. Vestibulum mollis leo ex, non aliquam risus lobortis a.</p>';
$message .= '</body></html>';

// Envoi d'email
if(mail($to, $subject, $message, $headers)){
    echo 'Votre message a été envoyé avec succès.';
} else{
    echo 'Impossible d\'envoyer des courriels. Veuillez réessayer.';
}
?>
```

> À savoir : La fonction PHP mail() fait partie du noyau PHP mais vous devez configurer un serveur de messagerie sur votre machine/serveur pour qu’il fonctionne vraiment.

## Introduction à PhpMailer avec PHP

L'envoi d'email en PHP se fait traditionnellement par la fonction mail(). En pratique, l'usage de cette fonction cause plusieurs problèmes : la première étant qu'il n'est pas possible de s'identifier au prêt d'un serveur SMTP. L'envoi s'effectuant de manière anonyme, et le mail arrivant très souvent dans les spams.

Pour cette raison une bibliothèque open source existe PHPMailer. Elle permet de simplifier l'ensembles des interactions avec un serveur SMTP.

## Comment déployer PhpMailer sur un projet en PHP ?

Pour intégrer PhpMailer à un projet, il faut suivre les étapes suivantes :

- Télécharger la source de PHPMailer : <https://github.com/PHPMailer/PHPMailer>
- Décompresser l'archive de PHPMailer
- Copier le dossier dans l'arborescence de votre projet à l'emplacement de votre choix
- Inclure dans le code PHP les dépendances minimales pour pouvoir envoyer un email avec PHPMailer

```php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
```

Le fonctionnement général pour envoyer un email en PHP avec PHPMailer

- Initialisation de l'objet PHPMailer.
- Paramétrage pour la communication avec le serveur SMTP.
- Définition de l'encodage.
- Désigner l'email de l'expéditeur et son alias.
- Création de l'email (objets, contenu HTML, variante de contenu texte).
- Ajout du ou des destinataires (avec ou sans alias).
- Ajout des destinataires CCI (copie conforme invisible).
    Envoye de l'email au serveur SMTP pour distribution.

## Comment paramétrer le serveur SMTP avec PHPMailer en PHP ?

L'initialisation de l'objet s'effectue via l'appel du constructeur de l'objet PHPMailer. On assigne alors le serveur SMTP à utiliser via la propriété Host. Puis on définit le port TCP à utiliser pour communiquer avec le serveur SMTP grâce à la propriété Port. Enfin on force la prioriété SMTPAuth à 1 pour utiliser l'authentification lors de l'envoi de l'email au serveur SMTP. Dans l'exemple suivant nous immiterons une connexion sur un serveur SMTP d'OVH :

```php
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'ssl0.ovh.net';               //Adresse IP ou DNS du serveur SMTP
$mail->Port = 465;                          //Port TCP du serveur SMTP
$mail->SMTPAuth = 1;                        //Utiliser l'identification

if($mail->SMTPAuth){
   $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
   $mail->Username   =  'login@ovh.net';   //Adresse email à utiliser
   $mail->Password   =  'password';         //Mot de passe de l'adresse email à utiliser
}
```

## Comment définir l'encodage avec PhpMailer ?

Pour définir l'encodage de l'email pour garantir une lisibilité optimum pour les destinataires il suffit d'assigner la proprieté CharSet avec le jeu d'encodage souhaité (ici UTF-8).

```php
$mail->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères
```

## Comment tenter d'établir la connexion au serveur SMTP avec PhpMailer ?

Une fois les informations d'identifications saisies, la méthode smtpConnect() permet de tester la connexion au serveur SMTP. Cette étape est optionnelle.

```php
$mail->smtpConnect();
```

## Comment définir l'email et l'alias de l'expéditeur ?

La proprieté From est obligatoire et permet de définir quel adresse email servira de référence en qualité d'expéditeur pour répondre à l'email (peut être différente de l'adresse utilisée pour l'authentification SMTP). La propriété FromName est quand à elle optionnelle et sert uniquement pour définir l'alias (le nom d'usage).

```php
$mail->From       =  'contact@ovh.net';                //L'email à afficher pour l'envoi
$mail->FromName   = 'Contact de ovh.net';             //L'alias à afficher pour l'envoi
```

## Comment créer l'email (objet, contenu texte et contenu HTML) ?

La prorpriété Subject permet de définir le sujet de l'email. La propriété MsgHTML désigne le fragment de HTML servant de contenu par défaut. La propriété AltBody sert à désigner quel contenu alternatif en texte brut sera utilisé dans le client de messagerie du destinataire.

```php
$mail->Subject    =  'Mon sujet';                      //Le sujet du mail
$mail->WordWrap   = 50;                       //Nombre de caracteres pour le retour a la ligne automatique
$mail->AltBody = 'Mon message en texte brut';         //Texte brut
$mail->IsHTML(false);                                  //Préciser qu'il faut utiliser le texte brut

if($Use_HTML == true){
   $mail->MsgHTML('<div>Mon message en <code>HTML</code></div>');                   //Le contenu au format HTML
   $mail->IsHTML(true);
}
```

## Comment ajouter un (ou plusieurs) destinataires (sans alias) ?

La fonction AddAddress permet de définir un déstinaire à qui remettre l'email.

```php
$list_emails_to = array('johndoe@ovh.net','maxlamenace@ovh.net');
foreach ($list_emails_to  as $key => $email) {
  $mail->AddAddress($email);
}
```

## Comment ajouter un destinataire (avec un alias) ?

```php
$mail->AddAddress('johndoe@ovh.net','John Doe');
```

## Comment ajouter un utilisateur en CCI/BBC (Copie conforme invisible) ?

```php
$mail->addBCC('hollow_man@ovh.net','Sebastian Caine');
```

## Comment ajouter une pièce jointe avec PhpMailer ?

Il est aisé d'ajouter une pièce jointe à un email via la méthode AddAttachment() cette méthode prend deux paramètres l'emplacement du fichier sur le serveur, et le nom du fichier qui sera affiché chez le destinataire de l'email.

```php
$mail->AddAttachment('./doc/content/rapport.pdf','Rapport_2018.pdf');  
```

## Comment envoyer l'email grâce à PHPMailer avec PHP ?

Pour envoyer l'email via PHPMailer, rien de plus simple, il suffit d'utiliser la méthode Send().

```php
if (!$mail->send()) {
      echo $mail->ErrorInfo;
} else{
      echo 'Message bien envoyé';
}
```

## Comment envoyer un email avec PHPMailer depuis un formulaire HTML ?

Supposons deux fichiers form_email.html et send_email.php en racine de notre serveur ainsi que le dossier PHPMailer qui contient les sources de la librairie de PHPMailer :

form_email.html qui contient le code html suivant :

```html
<form method="post" action="send_email.php">
  <input type="email" name="email_to" maxlength="255" placeholder="Email du destinataire"/>
 <input type="email" name="email_from" maxlength="255" placeholder="Email de l'emetteur" />
 <input type="text" name="email_from_alias" maxlength="255" placeholder="Alias de l'email de l'emetteur" />
 <input type="text" name="object" maxlength="255" placeholder="Objet de l'email" />
    <textarea name="body">
  
 </textarea>
 <input type="submit" value="Submit"/>
</form>
```

Et send_email.php qui contient le code PHP suivant qui sert à instancier l'envoi des données du formulaire au serveur SMTP pour arriver dans la boite email de votre destinataire.
Les données du formulaire récupérées avec $_POST doivent faire l'objet d'une sécurisation complémentaire.

```php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'ssl0.ovh.net';               //Adresse IP ou DNS du serveur SMTP
$mail->Port = 465;                          //Port TCP du serveur SMTP
$mail->SMTPAuth = 1;                        //Utiliser l'identification
$mail->CharSet = 'UTF-8';

if($mail->SMTPAuth){
   $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
   $mail->Username   =  'login@ovh.net';    //Adresse email à utiliser
   $mail->Password   =  'password';         //Mot de passe de l'adresse email à utiliser
}

$mail->From       = trim($_POST["email_from"]);                //L'email à afficher pour l'envoi
$mail->FromName   = trim($_POST["email_from_alias"]);          //L'alias de l'email de l'emetteur

$mail->AddAddress(trim($_POST["email_to"]));

$mail->Subject    =  $_POST["object"];                      //Le sujet du mail
$mail->WordWrap   = 50;           //Nombre de caracteres pour le retour a la ligne automatique
$mail->AltBody = $_POST["body"];         //Texte brut
$mail->IsHTML(false);                                  //Préciser qu'il faut utiliser le texte brut

if (!$mail->send()) {
      echo $mail->ErrorInfo;
} else{
      echo 'Message bien envoyé';
}
```

En conclusion, vous savez maintenant utiliser les fondamentaux de la librairie PHPMailer pour envoyer des emails en PHP via un serveur SMTP.
