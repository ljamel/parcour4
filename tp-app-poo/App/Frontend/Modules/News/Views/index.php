<link rel="stylesheet" href="./css/index.css" type="text/css"/>
<div class="titrePresentation">Présentation</div>
<?php
foreach ($listeNews as $key => $news) {
    if ($news['id'] == 2) {
        ?>
        <div id="presentation">
            <h3>
                <a href="news-<?= $news['id'] ?>.html">
                    <h1><?= $news['titre'] ?></h1>
                </a>
            </h3>


            <?php if ($news['image'] != '') { ?>
                <img src="/parcour4/Sources_TP_App/tp-app-poo/Web/images/<?= $news['image'] ?>"
                     alt="<?= $news['titre'] ?>">
            <?php } ?>
            <?= nl2br($news['contenu']) ?>
            <a href="news-<?= $news['id'] ?>.html">Lire la suite </a>
        </div>
        <?php
    }
}
?>

<h2>Si dessous les 5 derniers billets postés</h2>
</div>

<div class="wrap">
    <?php

    // TODO Ajouter lien page suivante
    foreach ($listeNews as $news) {
        if ($news['id'] != 1 && $news['id'] != 2) // Le if pour empecher que des page importante soit supprimer
        {
            ?>
            <div id="article">
                <h3>
                    <a href="news-<?= $news['id'] ?>.html">
                        <?= $news['titre'] ?>
                    </a>
                </h3>


                <?php if ($news['image'] != '') { ?>
                    <img src="/parcour4/Sources_TP_App/tp-app-poo/Web/images/<?= $news['image'] ?>"
                         alt="<?= $news['titre'] ?>">
                <?php } ?>
                <?= htmlspecialchars_decode($news['contenu']) ?>

                <a href=""> </a>...<span style="background-color: #FFFFFF;"><span style="color: #000000;"><br/><br/>
                        <!-- Pour que le lien "suite" ne soit pas casser a cause de tynimce -->
                <a href="news-<?= $news['id'] ?>.html">Lire la suite </a>
                        <?php if ($user->isAuthenticated()) { ?><br/>
                            <br/><a href="admin/news-update-<?= $news['id'] ?>.html"> <strong>Modifier</strong> </a>
                        <?php } ?>

            </div>
            <!-- Les erreurs html empeche l'affichage de la page ???? bizzar -->
            <?php

        }
    }

    ?>
</div>


