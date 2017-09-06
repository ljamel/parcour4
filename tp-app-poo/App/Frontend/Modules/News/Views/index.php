<style type="text/css"> /* Pour que le style soit afficher uniquement sur la page index PS;essayer de trouver une autre solution */
body {
	background-image: url(http://localhost/Sources_TP_App/tp-app-poo/Web/images/index.jpg);
	background-repeat: no-repeat;
	background-size: cover;
}
#content-wrap {
	background-color: rgba(245, 245, 245, 0.43);
}

</style>
<div class="titrePresentation">Présentation</div>
<?php
foreach ($preNews as $key => $news)
{
	if($key == 1) {
?>
	<div id="presentation"> 
		<h3>
			<a href="news-<?= $news['id'] ?>.html">
				<h1><?= $news['titre'] ?></h1>
			</a>
		</h3>

		<p>
			<img src="<?= $news['image'] ?>" alt="<?= $news['titre'] ?>">
			<?= nl2br($news['contenu']) ?>
		</p>
	</div>
	<?php
		         }
}
?>
<h2>Derniers articles postés</h2>
<?php
foreach ($firstNews as $news)
{
?>
	<div id="presentation"> 
		<h3>
			<a href="news-<?= $news['id'] ?>.html">
				<?= $news['titre'] ?>
			</a>
		</h3>

		<p>
			<img src="<?= $news['image'] ?>" alt="<?= $news['titre'] ?>">
			<?= nl2br($news['contenu']);  if ($user->isAuthenticated()) {  ?>
				
			<a href="admin/news-update-<?= $news['id'] ?>.html"> <strong>Modifier</strong> </a>
			<?php } ?>
		</p>
	</div>
	<?php
}
?>
<h2>Si dessous les 5 derniers articles postés</h2><br />
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

		<p>
			<img src="<?= $news['image'] ?>" alt="<?= $news['titre'] ?>">
			<?= nl2br($news['contenu']) ?> 
			
			<?php if ($user->isAuthenticated()) {  ?>	
			<a href="admin/news-update-<?= $news['id'] ?>.html"> <strong>Modifier</strong> </a>
			<?php } ?>
		</p>
	</div>
    <!-- Les erreurs html empeche l'affichage de la page ???? bizzar -->
	<?php


}

?>

<a href="" onclick="suivant.GET(suivant.$_GET('pageSuivante') +5)";>Suivant</a>


