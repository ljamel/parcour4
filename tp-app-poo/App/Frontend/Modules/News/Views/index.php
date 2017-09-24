<link rel="stylesheet" href="./css/index.css" type="text/css" />
<div class="titrePresentation">Présentation</div>
<?php
foreach ($listeNews as $key => $news)
{
	if($news['id'] == 2) {
?>
	<div id="presentation"> 
		<h3>
			<a href="news-<?= $news['id'] ?>.html">
				<h1><?= $news['titre'] ?></h1>
			</a>
		</h3>


            <?php  if ($news['image'] != '')  { ?>
                <img src="/parcour4/Sources_TP_App/tp-app-poo/Web/images/<?= $news['image'] ?>" alt="<?= $news['titre'] ?>">
            <?php } ?>
			<?= nl2br($news['contenu']) ?>

	</div>
	<?php
		         }
}
?>

        <h2>Si dessous les 5 derniers articles postés</h2>
	</div>

<div class="wrap">
	<?php

    // TODO Ajouter lien page suivante
    foreach ($listeNews as $news)
    {
    ?>
        <div id="article">
            <h3>
                <a href="news-<?= $news['id'] ?>.html">
                    <?= $news['titre'] ?>
                </a>
            </h3>


                <?php  if ($news['image'] != '')  { ?>
                    <img src="/parcour4/Sources_TP_App/tp-app-poo/Web/images/<?= $news['image'] ?>" alt="<?= $news['titre'] ?>">
                <?php } ?>
                <?= nl2br($news['contenu']) ?>

                <?php if ($user->isAuthenticated()) {  ?>
                <a href="admin/news-update-<?= $news['id'] ?>.html"> <strong>Modifier</strong> </a>
                <?php } ?>

        </div>
        <!-- Les erreurs html empeche l'affichage de la page ???? bizzar -->
        <?php


    }

    ?>
</div>
<a href="" onclick="suivant.GET(suivant.$_GET('pageSuivante') +5)";>Suivant</a>


