<style type="text/css">
	#main {
		margin-top: 170px;
	}

</style>
<!-- page unique -->

<div id="page">
	<p>Par <em><?= $news['auteur'] ?></em>, le
		<?= $news['dateAjout']->format('d/m/Y à H\hi') ?>
	</p>
	<h2>
		<?= $news['titre'] ?>
	</h2>
	<p>
		<img src="<?= $news['image'] ?>" alt="<?= $news['titre'] ?>">
		<?= nl2br($news['contenu']) ?><br />
			<?php if ($user->isAuthenticated()) {  ?>
			<a href="admin/news-update-<?= $news['id'] ?>.html"> <strong>Modifier</strong> </a>
			<?php } ?>
	</p>
</div>
<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
<p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>


<?php
if (empty($comments))
{
?>
	<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
	<?php
}

foreach ($comments as $comment)
{
?>
<div>
		<fieldset>
			<legend>
				Posté par <strong><?= $comment['auteur'] ?></strong> le
				<?= $comment['date']->format('d/m/Y à H\hi') ?>
					<?php if ($user->isAuthenticated()) { ?> -
					<a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
					<a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a> |
					<?php } ?>

                    <a href="comment-signal-<?= $comment['id'] ?>.html">Signaler</a>
			</legend>
			<p>
				<?= $comment['contenu'] ?>
			</p>
		</fieldset>
		<?php
}
?>
<div class="ajoutCom"><a href="commenter-<?= $news['id'] ?>.html"><span id="commentaire"> Ajouter un commentaire </span></a></div>
</div>