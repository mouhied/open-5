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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Mes posts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/posts">Accueil </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/admin">Accueil de l'administration</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                    
                    <li class="nav-item">
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
    <header class="masthead" style="background-image: url('contenu/img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Mon Blog</h1>
                        <span class="subheading"><strong>Zone d'administration</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

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

    <script src="contenu/js/jquery.min.js"></script>
    <script src="contenu/js/bundle.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="contenu/js/mon-blog.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>