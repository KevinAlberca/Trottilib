<header>
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
        <i>En attente du logo</i>
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
                    <li><a href="./?page=accueil">Accueil</a></li>
                    <li><a href="./?page=abonnement">Nos Abonnements</a></li>
                    <li><a href="./?page=comment-ca-marche">Comment ça marche ?</a></li>
                    <li><a href="./?page=plan">Plan des stations</a></li>
<?php
if(isset($_SESSION['user']) && !empty($_SESSION['user']) ) {
    echo '<li><a href="./?page=MonEspace">Mon Espace { ' .$_SESSION['user']['nom'] .' '.$_SESSION['user']['prenom']. '}</a></li>';
    echo '<li><a href="./?page=logout">Deconnexion</a></li>';
}else {
    echo '<li><a href="./?page=connexion">Mon Espace</a></li>';
}
?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="clearfix"></div>
</header>
<!-- ./header -->