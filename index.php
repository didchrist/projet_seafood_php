<?php session_start();
$_POST= filter_input(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
/* Initialisation des variables mémoire pour les champ de création d'article */
if (isset($_SESSION['premier-paragraphe'])){
    $premier_Paragraphe = $_SESSION['premier-paragraphe'];
    $deuxieme_Paragraphe = $_SESSION['deuxieme-paragraphe'];
    $troisieme_Paragraphe = $_SESSION['troisieme-paragraphe'];
}
else {
    $premier_Paragraphe = "Votre premier paragraphe ...";
    $deuxieme_Paragraphe = "Votre deuxième paragraphe ...";
    $troisieme_Paragraphe = "Votre troisième paragraphe ...";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Création d'un article</title>
</head>

<body>
    <header class="background-about-1 d-flex justify-content-between flex-column align-items-center">
        <?php include 'header.php' ?>
        <div>
            <h1>seafood</h1>
            <p class="text-bleu">Super form</p>
        </div>
        <div></div>
    </header>
    <!-- variable retour de script-transition sur les succès et erreurs des forms-->
    <?= $_SESSION['errors-succes'] ?? "" ?>

    <!-- form connexion utilisateur relié au json -->
    <?php if(!isset($_COOKIE['utilisateur'])): ?>
    <form action="./script-transition.php" method="POST">
        <input type="email" id="email" name="email" required>
        <input type="password" id="password" name="password" required>
        <button type="submit">Valider</button>
    </form>
    <!-- form sous condition après connexion utilisateur pour la partie création blog -->
    <?php else: ?>
    <form class="p-2 container" id="form" action="./script-transition.php" method="POST" enctype="multipart/form-data">
        <input class="titre-input m-2" type="text" name="titre-h1" placeholder="Votre gros titre"
            value="<?= $_SESSION['titre-h1'] ?? ""; ?>">
        <textarea class="paragraphe-input m-2" name="premier-paragraphe"><?= $premier_Paragraphe; ?>
        </textarea>
        <textarea class="paragraphe-input m-2" name="deuxieme-paragraphe"><?= $deuxieme_Paragraphe; ?></textarea>
        <input class="titre-input m-2" type="text" name="titre-h2" placeholder="Votre second titre"
            value="<?= $_SESSION['titre-h2'] ?? ""; ?>">
        <textarea class="paragraphe-input m-2" name="troisieme-paragraphe"><?= $troisieme_Paragraphe; ?></textarea>
        <button name="verif-blog" type="submit">Prévisualiser</button>
        <!-- mise en place du bouton mettre en ligne uniquement sous confirmation d'un visuel établie et d'une image valide -->
        <?php if (isset($_SESSION['retour-blog'])): ?>
        <button type="submit" name="validation">Mettre en ligne le post.</button>
        <?php endif; ?>
        <!-- partie du form sur l'image donné par l'utilisateur pour le blog celui disparait après bonne utilisation pour éviter d'envoyer plusieur image qui surchagerait le dossier -->
        <?php if(!isset($_SESSION['etat-succes'])): ?>
        <div class="d-flex justify-content-center">
            <input type="file" name="image">
            <button name="verif-image" name="true" type="submit">Envoyer</button>
        </div>
        <?php endif; ?>
    </form>
    <?php endif; ?>
    <!-- partie visualition se déclenche uniquement après remplie les champs, avoir fournie un bonne image et etre connecter -->
    <?php if(isset($_SESSION['retour-blog'])): ?>
    <section class="container-fluid d-flex justify-content-center border row gx-4" id="visualisation">
        <article class="col-8">
            <div class="position-relative">
                <img class="img-fluid" src='<?= $_SESSION['image-chemin']; ?>' alt="article">
                <p class="petit-carre-orange position-absolute top-0 end-0 m-4">20 june</p>
            </div>
            <h2 class="text-dark"><?= $_SESSION['titre-h1'] ?></h2>
            <div class="d-flex">
                <img src="./img/author-avatar-1.png" alt="avatar de l'auteur">
                <p>By <?=$_COOKIE['utilisateur']?></p>
                <p>Desserts/Cooking/Food</p>
            </div>
            <p><?= $_SESSION['premier-paragraphe'] ?></p>
            <p><?= $_SESSION['deuxieme-paragraphe'] ?></p>
            <h3><?= $_SESSION['titre-h2'] ?></h3>
            <div class="d-flex">
                <div class="col-8 d-flex flex-wrap">
                    <div class="col-6">
                        <img class="img-fluid p-2" src="./img/blog-single-1.jpg" alt="bol">

                    </div>
                    <div class="col-6">
                        <img class="img-fluid p-2" src="./img/blog-single-2.jpg" alt="soupe">
                    </div>
                    <img class="w-100 p-2" src="./img/blog-single-3.jpg" alt="saumon">
                </div>
                <div class="col-4">
                    <img class="img-fluid p-2" src="./img/blog-single-4.jpg" alt="crevette">
                </div>
            </div>
            <p><?= $_SESSION['troisieme-paragraphe'] ?></p>
            <div>
                <p>Share:</p>
            </div>
            <div class="blogsingle-black p-5 text-center">
                <img src="./img/author-board.png" alt="photo de l'auteur">
                <p class="text-light p-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, illo!</p>
                <p class="text-light text-uppercase">kathy larson</p>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <p>The wise man therefore</p>
                    <a href="#">Previous post</a>
                </div>
                <div>
                    <p>The wise man therefore</p>
                    <a href="#">Next post</a>
                </div>
            </div>
        </article>
        <aside class="col-3">
            <div class="blogsingle-black col-9 p-5 text-center">
                <img src="./img/widget-person.png" alt="photo de Bryan">
                <p class="text-light text-uppercase pt-3">bryan bennett</p>
                <p class="couleur-or">Master Chef</p>
                <img src="./img/signature.png" alt="signature">
            </div>
            <h3 class="pt-4">categories</h3>
            <div class="d-flex flex-column py-3">
                <a class="py-1" href="#">Seafood (2)</a>
                <a class="py-1" href="#">Coffee (5)</a>
                <a class="py-1" href="#">Restaurant (18)</a>
                <a class="py-1" href="#">Cupcake (22)</a>
                <a class="py-1" href="#">Lunch (19)</a>
            </div>
            <h3>Latest post</h3>
            <div class="d-flex">
                <img src="./img/latest-post-thumb-1.png" alt="gateaux aux myrthilles">
                <div class="px-3">
                    <p class="m-0 pt-3 ">There many variations</p>
                    <p>July 23, 2018</p>
                </div>
            </div>
            <div class="d-flex">
                <img src="./img/latest-post-thumb-2.png" alt="cafe">
                <div class="px-3">
                    <p class="m-0 pt-3">All the Lorem Ipsum</p>
                    <p>July 23, 2018</p>
                </div>
            </div>
            <div class="d-flex">
                <img src="./img/latest-post-thumb-3.png" alt="dessert">
                <div class="px-3">
                    <p class="m-0 pt-3">The first line of Lorem</p>
                    <p>July 23, 2018</p>
                </div>
            </div>
            <div class="d-flex mb-5">
                <img src="./img/latest-post-thumb-4.png" alt="gateau">
                <div class="px-3">
                    <p class="m-0 pt-3">The standard chunk</p>
                    <p>July 23, 2018</p>
                </div>
            </div>
            <h3 class="my-4">Follow instagram</h3>
            <div class="d-flex flex-wrap mb-5">
                <img class="col-4 p-2" src="./img/instagram-small-1.jpg" alt="image instagram 1">
                <img class="col-4 p-2" src="./img/instagram-small-2.jpg" alt="image instagram 2">
                <img class="col-4 p-2" src="./img/instagram-small-3.jpg" alt="image instagram 3">
                <img class="col-4 p-2" src="./img/instagram-small-4.jpg" alt="image instagram 4">
                <img class="col-4 p-2" src="./img/instagram-small-5.jpg" alt="image instagram 5">
                <img class="col-4 p-2" src="./img/instagram-small-6.jpg" alt="image instagram 6">
            </div>
            <h3>Tag cloud</h3>
            <div class="d-flex flex-wrap">
                <p class="blogsingle-boite-filtre m-2 p-2">Natural</p>
                <p class="blogsingle-boite-filtre m-2 p-2">Fruits</p>
                <p class="blogsingle-boite-filtre m-2 p-2">Dried</p>
                <p class="blogsingle-boite-filtre m-2 p-2">Food fresh</p>
                <p class="blogsingle-boite-filtre m-2 p-2">Natural</p>
                <p class="blogsingle-boite-filtre m-2 p-2">Healthy</p>
            </div>
            <img class="img-fluid my-5" src="./img/widget-banner.jpg" alt="promo 50%">
        </aside>
    </section>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>