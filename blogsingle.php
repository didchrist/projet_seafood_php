<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogsingle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="background-blog-1 d-flex justify-content-between flex-column align-items-center">
        <?php include './header.php' ?>
        <div>
            <h1>blog single</h1>
            <p class="text-bleu">~The things you want to find~</p>
        </div>
        <div></div>
    </header>
    <div class="d-flex justify-content-center row gx-5 my-5">
        <section class="col-7">
            <article>
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
        </section>
        <aside class="col-2">
            <div class="blogsingle-black p-5 text-center">
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
    </div>
    <section>
        <h3>comments</h3>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>