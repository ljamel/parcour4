<p style="text-align: center; width:1800px;">Il y a actuellement <?= $nombreNews ?> articles. En voici la liste :</p>

<table>
  <tr><th class="none">Auteur</th><th>Titre</th><th>Date d'ajout</th><th class="none">Dernière modification</th><th>Action</th></tr>
<?php
foreach ($listeNews as $news)
{
  echo '<tr><td class="none">', $news['auteur'], '</td><td>', $news['titre'], '</td><td>le ', $news['dateAjout']->format('d/m/Y à H\hi'), '</td><td class="none">', ($news['dateAjout'] == $news['dateModif'] ? '-' : 'le '.$news['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="news-update-', $news['id'], '.html"> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a> <a href="news-delete-', $news['id'], '.html"> <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a></td></tr>', "\n";
}
?>
</table>