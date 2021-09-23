<body>
    <div id="container">
        <div class="title">
            <h1>E - Roulette</h1>
        </div>
        <div class="sous-titre">
            <h2>Connexion</h2>
        </div>
        <form method="post" action="../controller/controller_connexion.php">
            <div class="nom">
                <input type="text" name="username" placeholder="Nom d'utilisateur">
            </div>
            <div class="motdepasse">
                <input type="password" name="userpassword" placeholder="Mot de passe">
            </div>
            <div class="button">
                <button name="btnconnexion" class="bt-connexion">Connexion</button>
                <button type="reset" class="bt-reset">Effacer</button>
            </div>
        </form>
        <div class="inscription">
            <a id="inscription" href="../controller/controller_inscription.php">Vous ête nouveaux? Inscrivez-vous ici</a>
        </div>
        <p><?php print_r($message)?></p>
    </div>
