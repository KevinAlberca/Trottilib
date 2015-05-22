<header class="homepage">
    <div class="btn-group language">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="./static/img/flag_french.png" alt="Langue Française"/> FRA <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#"><img src="./static/img/flag_us.png" alt="English Language"/> ENG</a></li>
            <li><a href="#"><img src="./static/img/flag_spain.png" alt="Espagñol idioma"/> ESP</a></li>
        </ul>
    </div>

    <div class="logo">
        <img src="./static/img/Logo.png" alt="Logo Trottilib'"/>
    </div>
    <h1>Trottilib'</h1>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="./">Accueil</a></li>
                    <li><a href="./?page=abonnement">Nos Abonnements</a></li>
                    <li><a href="./?page=comment-ca-marche">Comment ça marche ?</a></li>
                    <li><a href="./?page=plan">Plan des stations</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(isset($_SESSION['user']) && !empty($_SESSION['user']) ) {
                        echo '<li><a href="./?page=MonEspace">Mon Espace</a></li>';
                        echo '<li><a href="./?page=panier"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>';
                        echo '<li><a href="./?page=logout"><span class="glyphicon glyphicon-log-out"></span></a></li>';
                    }else {
                        echo '<li><a href="./?page=connexion">Mon Espace</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 concept">
        <h2>Notre concept</h2>
        <p>
            Etiam sed lobortis metus. Aliquam erat volutpat. Nullam sed mattis ligula. Nam euismod imperdiet euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sagittis vel lacus quis consequat. Nulla eget ullamcorper nisi. Sed lobortis mauris vel enim fringilla pretium. Fusce nibh neque, viverra nec egestas vitae, fermentum at diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra nunc ante, sed tempor odio pharetra eu. Praesent pharetra fringilla ex ac ornare. Etiam neque tortor, varius eget tellus vitae, dignissim euismod lorem. Quisque erat neque, blandit vitae facilisis sed, consectetur vitae erat. Proin faucibus varius arcu, et ullamcorper est auctor vel.

            Maecenas a posuere arcu, ac dignissim massa. Etiam nunc est, facilisis ut sapien quis, dapibus consectetur ante. Quisque at turpis odio. Vestibulum in dignissim odio. Praesent sed nunc at eros facilisis semper. Phasellus porta mi a feugiat sodales. Sed vel sagittis ligula. Nullam nec turpis ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla nec arcu commodo, finibus tellus sed, finibus odio. Donec sed nisl rutrum, varius nulla vitae, porttitor tellus. Praesent posuere sed diam a ultricies. Curabitur et augue id mauris sollicitudin tempus.
        </p>
    </div>
    <div class="clearfix"></div>
</header>
<!-- ./header -->

<div class="wrap">
    <div class="container-fluid avantages">
        <h2 class="title">Avantages</h2>
        <div class="col-xs-12 col-sm-4">
            <h4 class="title">Efficacite</h4>
            <img src="static/img/efficacite.png" alt="" class="img-responsive"/>
            Une efficacité à toute épreuve, qui vous permet de gagner du temps dans vos déplacements et vous permet d’éviter ces petits retards du quotidien.
        </div>
        <div class="col-xs-12 col-sm-4">
            <h4 class="title">Rapidite</h4>
            <img src="static/img/rapidite.png" alt="" class="img-responsive"/>
            Un moyen de transport qui permet de se déplacer plus rapidement et vous permet d’éviter les longs trajets à pieds.Un moyen économique pour gagner du temps
        </div>
        <div class="col-xs-12 col-sm-4">
            <h4 class="title">Petit</h4>
            <img src="static/img/adaptabilite.png" alt="" class="img-responsive"/>
            Une trottinette qui s’adapte à votre taille que vous soyez grands ou petits, Trottilib’ est là pour que vous soyez à l’aise dans tous vos déplacements.
        </div>
    </div>
    <!-- ./avantages -->

    <div class="row">
        <div class="container-fluid fonctionnement">
            <h2 class="title">Comment ca marche ? </h2>
            <div class="col-xs-12 col-sm-3">
                <div class="buble">1</div><h4>Je m'abonne</h4>
                <img src="static/img/abonnement.png" alt="" class="img-responsive"/>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="buble">2</div><h4>Je loue</h4>
                <img src="static/img/je-loue.png" alt="" class="img-responsive"/>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="buble">3</div><h4>Je glisse</h4>
                <img src="static/img/je-glisse.png" alt="" class="img-responsive"/>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="buble">4</div><h4>Je range</h4>
                <img src="static/img/je-range.png" alt="" class="img-responsive"/>
            </div>
        </div>
        <!-- ./fonctionnement -->
        <div class="col-xs-12 but-trottilib">
            <div class="col-xs-12 col-sm-4">
                <img src="./static/img/iPhone.png" alt="" />
                <h4 class="title">Disponibilité 24h/24</h4>
            </div>
            <div class="col-xs-12 col-sm-4">
                <img src="./static/img/trottinette.png" alt="" />
                <h4 class="title">Trottinette de qualité</h4>
            </div>
            <div class="col-xs-12 col-sm-4">
                <img src="./static/img/economie.png" alt="" />
                <h4 class="title">Économie de temps et d'argent</h4>
            </div>

        </div>

        <div class="col-xs-12 map">
            <!-- Before using google maps's API, I will use an image -->
            <img src="./static/img/map.png" alt="Retrouvez tout les points de rendez-vous sur cette mini carte" class="img-responsive"/>
            <div class="clearfix"></div>
        </div>

        <div class="container-fluid avis">
            <h2 class="title">Les avis des consommateurs</h2>
            <h3 class="title">À propos de Trottilib'</h3>
            <div class="col-xs-12 col-sm-4">
                <blockquote>
                    <q>Trottilib', un moyen de transport innovant, qui garantie une rapidité dans les trajets courts.</q><br />
                    <cite><img src="./static/img/user.png" alt="Profil de l'utilisateur Adrien Boyld"/> Adrien Boyld</cite>
                </blockquote>
            </div>
            <div class="col-xs-12 col-sm-4">
                <blockquote>
                    <q>Trottilib', un moyen de transport innovant, qui garantie une rapidité dans les trajets courts.</q><br />
                    <cite><img src="./static/img/user.png" alt="Profil de l'utilisateur Jennifer James"/> Jennifer James</cite>
                </blockquote>
            </div>
            <div class="col-xs-12 col-sm-4">
                <blockquote>
                    <q>Trottilib', un moyen de transport innovant, qui garantie une rapidité dans les trajets courts.</q><br />
                    <cite><img src="./static/img/user.png" alt="Profil de l'utilisateur Kevin Perry"/> Kevin Perry</cite>
                </blockquote>
            </div>
        </div>
        <!-- ./avis -->
    </div>
    <!-- ./row -->
</div>
<!-- ./wrap -->



