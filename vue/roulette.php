<body>
    <div id="container_roulette">
        <button name="btdeco" class="bt-deco"><a id="deconnexion" href="../controller/controller_connexion.php?deco">Déconnexion</a></button>
        <div id="form_mise">
            <form method="post" action="../controller/controller_roulette.php">
                <div id="title">
                    <h1>E - Roulette</h1>
                </div>
                <div id="subtitle">
                    <h3>Bonjour <?php print_r($user->name) ?> vous disposez de <?php print_r($user->money) ?>€ dans votre portefeuille.</h3>
                </div>
                <div id="input_mise">
                    <input type="number" id="input-nombre" name="mise" placeholder="Votre mise en €">
                </div>  
                <div id="type_mise">
                        <div id="mise_sur_nombre">
                            <h2>Miser le nombre</h2>
                            <input type="number" id="input-argent" name="chx_nombre" placeholder="Entre 1 et 36">
                        </div>
                        <div id="mise_sur_parité">
                            <h2>Miser la parité</h2>
                            <div id="radio-button">
                                <div id="rb-paire">
                                    <input type="radio" name="parite" value="paire">
                                    <label>Paire</label>
                                </div>
                                <div id="rb-impaire">
                                    <input type="radio" name="parite" value="impaire">
                                    <label>Impaire</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div id="jouer">
                    <button name="btnjouer" class="bt-jouer">Jouer</button>
                </div>
            </form>
            <p><?php print_r($info) ?></p>
            <p><?php print_r($nombreal) ?></p>
            <p><?php print_r($mes) ?></p>

        </div>
    </div>