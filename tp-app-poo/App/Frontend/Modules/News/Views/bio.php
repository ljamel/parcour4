<link rel="stylesheet" href="./css/show.css" type="text/css" />
<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 11/09/2017
 * Time: 11:00
 */

foreach ($bioNews as $key => $news)
{
    if($news['id'] == 1) {
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
        </div><br /><a href="/parcour4/Sources_TP_App/tp-app-poo/Web/admin/news-update-1.html">Modifier la page</a>
        <?php
    }
}