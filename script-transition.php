<?php session_start();
$_POST = filter_input_array(INPUT_POST, [
    'titre-h1' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'titre-h2' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'premier-paragraphe' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'deuxieme-paragraphe' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'troisieme-paragraphe' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'verif-blog' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'validation' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'verif-image' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
]);

/* reinitialisation de certaine variable état */
unset($_SESSION['errors-succes']);
unset($_SESSION['etat-succes']);
unset($_SESSION['retour-blog']);

/* function pour afficher le nom de l'utilisateur via son adresse mail */
function getName ($a){
    $a = preg_split('/[.\-@]/' , $a);
    return $a[0];
    }

/* partie verif pour la connexion utilisateur */
$filename = './data/data.json';
if (file_exists($filename) and isset($_REQUEST['email']) and isset($_REQUEST['password'])){
    $data = file_get_contents($filename);
    $utilisateurs = json_decode($data,true) ??[];
    var_dump($utilisateurs);
    $mdp_Index = array_search($_REQUEST['email'], array_column($utilisateurs, 'password'));
    if ($utilisateurs[$mdp_Index]['password'] === $_REQUEST['password']){
        $_SESSION['utilisateur'] = getName($utilisateurs[$mdp_Index]['email']);
        setcookie('utilisateur', $_SESSION['utilisateur'], time()+3600*24,"/",'', true, true);
        $_SESSION['errors-succes'] = "Bienvenue ".$_SESSION['utilisateur'];
    }
    else {
        $_SESSION['errors-succes'] = "Non";
    }
    
    header('Location: ./index.php');
}

/* partie verif pour l'image */
if(isset($_POST['verif-image'])){
    if ($_FILES['image']['error'] ==4) {
        $_SESSION['errors-succes'] = "Veuillez insérer une image valide.";
    }
    if ($_FILES['image']['error'] ==0) {
        if($_FILES['image']['size'] > 150000) {
            $_SESSION['errors-succes'] = "Votre image est trop lourde.";
        }
        $extension = strchr($_FILES['image']['name'],'.');
        if ($extension != '.jpg' and $extension != '.png') {
            $_SESSION['errors-succes'] = "Votre format d'image n'est en .png ou .jpg.";
        }
        if(!isset($_SESSION['errors-succes'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], './img/element'.$extension);
            $_SESSION['errors-succes']= "l'image est chargée";
            $_SESSION['etat-succes'] = true;
            $_SESSION['image-chemin'] = './img/element'.$extension;
        }
    }
    header('Location: ./index.php#form');
}

/* initialisation des variables retour input */
print_r($_POST);
$_SESSION['titre-h1'] = $_POST['titre-h1'] ?? "";
$_SESSION['titre-h2'] = $_POST['titre-h2'] ?? "";
$_SESSION['premier-paragraphe'] = $_POST['premier-paragraphe'] ?? "";
$_SESSION['deuxieme-paragraphe'] = $_POST['deuxieme-paragraphe'] ?? "";
$_SESSION['troisieme-paragraphe'] = $_POST['troisieme-paragraphe'] ?? "";

/* partie verif affichage visualition et validation de la page */
if(isset($_POST['verif-blog']) and file_exists($_SESSION['image-chemin'])) {
    $_SESSION['retour-blog'] = true;
    header('Location: ./index.php#visualisation');
}
elseif (isset($_POST['verif-blog'])) {
    $_SESSION['errors-succes'] = "Veuillez insérer une image valide.";
    header('Location: ./index.php#form');
}
if (isset($_POST['validation'])) {
    header('Location: ./blogsingle.php');
}