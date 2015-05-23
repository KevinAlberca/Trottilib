<div class="row">
    <h1 class="title">Mon Espace</h1>
    <div id="myOwnTab" class="col-xs-12 col-sm-offset-2 col-sm-8">
        <div class="tab-menu">
            <span class="tab-link tab-link-left tab-link-active link-left">Mes Informations</span>
            <span class="tab-link tab-link-middle link-middle">Mon Abonnement</span>
            <span class="tab-link tab-link-right link-right">Changement d'Adresse</span>
            <div class="clear"></div>
        </div>
        <div class="tab-content">
            <div class="tab-wrap">
                <div class="tab" id="tab-left">
                    <!-- Contenu -->
                    <h2 class="title">Mes Informations</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Adresse</th>
                                    <th>Code Postal</th>
                                    <th>Ville</th>
                                    <th>Adresse e-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $_SESSION['user']['nom']; ?></td>
                                <td><?php echo $_SESSION['user']['prenom']; ?></td>
                                <td><?php echo $_SESSION['user']['adresse']; ?></td>
                                <td><?php echo $_SESSION['user']['code_postal']; ?></td>
                                <td><?php echo $_SESSION['user']['ville']; ?></td>
                                <td><?php echo $_SESSION['user']['email']; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab" id="tab-middle">
                    <h2 class="title">Mon abonnement</h2>
                    <!-- Contenu -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>#</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Username</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab" id="tab-right">
                    <h2 class="title">Changement d'adresse</h2>
                    <!-- Contenu -->

                    <form method="POST">
                            <div class="form-group">
                                <label for="new_adresse">Nouvelle Adresse</label>
                                <input type="text" class="form-control" name="new_adresse" id="new_adresse" value="<?php echo $_SESSION['user']['adresse'];?>" required />
                            </div>
                            <div class="form-group">
                                <label for="new_codePostal">Nouveau Code Postal</label>
                                <input type="number" class="form-control" name="new_codePostal" id="new_codePostal" value="<?php echo $_SESSION['user']['code_postal']; ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="new_ville">Nouvelle Ville</label>
                                <input type="text" class="form-control" name="new_ville" id="new_ville" value="<?php echo $_SESSION['user']['ville']; ?>" required />
                            </div>

                            <button type="submit" class="btn btn-default">Changer</button>
                        </form>
                    </form>
                    <?php

                    if(isset($_POST['new_adresse'], $_POST['new_codePostal'], $_POST['new_ville'])) {

                        $user->changeAdresse($_SESSION['user']['id'], $_POST['new_adresse'], $_POST['new_codePostal'], $_POST['new_ville']);
#   Changement d'adresse fait -> On la change en session.
                        $user->getAdresseAndCodePostalById($_SESSION['user']['id']);

                        unset($_SESSION['user']['adresse'], $_SESSION['user']['code_postal'], $_SESSION['user']['ville']);

                        $u = [
                            'adresse' => $user->getAdresseAndCodePostalById($_SESSION['user']['id'])['adresse'],
                            'code_postal' =>$user->getAdresseAndCodePostalById($_SESSION['user']['id'])['code_postal'],
                            'ville' =>$user->getAdresseAndCodePostalById($_SESSION['user']['id'])['ville'],
                        ];


                        $_SESSION['user'] = array_merge($_SESSION['user'], $u);
                    }
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>