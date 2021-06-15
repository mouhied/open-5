<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="contenu/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="contenu/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="contenu/css/blog.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        <a class="navbar-brand" href="/posts">Mes posts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/posts">Articles </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                    <?php if (isset($_SESSION['user']['roles']) && in_array('ROLE_ADMIN', $_SESSION['user']['roles'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="/users/logout">Déconnexion</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="/users/login">Connexion </a>
                    </li>
                <?php endif; ?>


            </ul>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('contenu/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Mon Blog</h1>
                        <span class="subheading">Developpeur d'application PHP/Symfony</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="accueil">
        <div class="container-fluid bg-light py-5 text-center">
            <h2 class="text-danger">À propos</h2>
            <p class="font-weight-bold mb-0">Qui suis je ?</p>
        </div>

        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-4 col-md-12" id="picture">
                    <img src="contenu\img\couverture.png" alt="Univers" class="rounded img-fluid">
                </div>
                <div class="col-lg-8 col-md-12">
                    <h3 class="text-center title-sm">
                        <span class="font-weight-bold text-danger">Hassan MOUHIEDDINE</span>,
                        <span class="font-weight-bold">Développeur PHP / Symfony</span>.
                    </h3>

                    <ul class="list-unstyled d-flex justify-content-center row small text-muted">
                        <li class="mr-2">
                            
                            <img src="contenu\img\fa.png" alt=""> 36 ans
                        </li>
                        <li class="mr-2">
                            
                            <img src="contenu\img\gmail.png" alt=""> mouhieddinehassan@gmail.com
                        </li>
                    </ul>

                    <p>
                        <span class="font-weight-bold">Curieux</span> et <span class="font-weight-bold">passionné</span> par
                        l'informatique et plus particulièrement par le <span class="font-weight-bold">développement
                            Web</span>, j'ai pu acquérir de nombreuses compétences professionnelles en <span
                            class="font-weight-bold">autodidacte</span> et en suivant le parcours de <span
                            class="font-weight-bold">Développeur Web Junior (niveau III)</span> chez OpenClassrooms.
                    </p>
                    <p>
                        Le développement <span class="font-weight-bold">Back-End</span> m'ayant beaucoup plus durant ma
                        formation, je me suis spécialisé sur le langage <span class="font-weight-bold">PHP</span> avec le
                        framework <span class="font-weight-bold">Symfony</span>.
                    </p>
                    <p>
                        Actuellement, j'ai commencé un nouveau parcours de <span class="font-weight-bold">Développeur
                            d'application PHP / Symfony (niveau II)</span> pour continuer à me perfectionner sur ces 2
                        technologies que j'affectionne.
                    </p>
                    <p>
                        N'hésitez pas à me <a href="/contact" class="text-danger font-weight-bold">contacter</a> pour plus
                        de <span class="font-weight-bold">renseignements</span>.
                    </p>

                    <hr>
                    <div class="col text-center">
                       <a href="https://www.linkedin.com/in/hassan-mouhieddine-4b290b79/" target="_blank" title="Mon Linkedin"><img src="contenu\img\LinkedIn.png" alt="Linkedin">
                         
                        </a>
                        <a href="https://github.com/mouhied" target="_blank" title="Mon Github">
                        <img src="contenu\img\git.png" alt="GitHub">
                        </a>
                        <a href="contenu\CV-Hassan-Mouhieddine.pdf" title="Mon CV" download>
                        <img src="contenu\img\CV.png" alt="CV">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <?php if (!empty($_SESSION['erreur'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['erreur'];
                unset($_SESSION['erreur']); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        <?= $content ?>
    </div>
    <footer class="site-footer footer bg-dark text-white-50">

        <div class="container text-center text-md-left">

            <div class="row ">

                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-danger">À propos</h5>
                    <p>Hassan Mouhieddine, je suis Développeur PHP / Symfony dans la région Limousin.</p>
                    <h5 class="text-danger">Contact</h5>
                    <ul class="list-unstyled">
                        <li>
                            <img src="contenu\img\gmail.png" alt="Gmail">
                            mouhieddinehassan@gmail.com
                        </li>
                    </ul>
                </div>

                <hr class="clearfix w-100 d-md-none pb-3">

                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-danger">Pages</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="/" class="footer-link">Accueil</a>
                        </li>
                        <li>
                            <a href="/posts" class="footer-link">Articles</a>
                        </li>
                        <li>
                            <a href="/contact" class="footer-link">Contact</a>
                        </li>
                        <li>
                            <a href="users/login" class="footer-link">Se connecter</a>
                        </li>
                        <li>
                            <a href="users/register" class="footer-link">S'inscrire</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-danger">Liens</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="https://www.linkedin.com/in/hassan-mouhieddine-4b290b79/" target="_blank" class="footer-link">
                                Linkedin
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/mouhied" target="_blank" class="footer-link">
                                Github
                            </a>
                        </li>
                        <li>
                            <a href="contenu\CV-Hassan-Mouhieddine.pdf" title="Mon CV" download class="footer-link">
                                CV
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="bg-light text-dark  py-3 text-center " >
            © 2021 Copyright :<span class="text-primary font-weight-bold"> Blog Project</span>
        </div>


    </footer>
    <script src="contenu/js/jquery.min.js"></script>
    <script src="contenu/js/bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="contenu/js/mon-blog.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>