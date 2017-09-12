<div id="manage">
    <div id="menuSecond">
        <button class="bouton" onclick="manageComment.openComment()"> commentaires </button>
        <button class="bouton" onclick="manageComment.openManage()"> articles </button>
    </div>
    <div id="manageArticle">
        <p>Il y a actuellement <?php echo $nombreNews - 2; ?> articles. En voici la liste :</p>
        <table>
            <tr>
                <th class="none">Auteur</th>
                <th>Titre</th>
                <th>Date d'ajout</th>
                <th class="none">Dernière modification</th>
                <th>Action</th>
            </tr>
            <?php

            // todo ajouter une page contacte envoie mail
            foreach ($listeNews as $news)
            {
                if($news['id'] != 1 && $news['id'] != 2) // Le if pour empecher que des page importante soit supprimer
                {
                    echo ' <tr><td class="none">', $news['auteur'], '</td><td>', $news['titre'], '</td><td>le ', $news['dateAjout']->format('d/m/Y à H\hi'), '</td><td class="none">', ($news['dateAjout'] == $news['dateModif'] ? '-' : 'le ' . $news['dateModif']->format('d/m/Y à H\hi')), '</td><td><a href="news-update-', $news['id'], '.html"> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i> </a>
  
  <i class="fa fa-trash-o fa-2x" aria-hidden="true" onclick="del.bouton(', $news['id'], ');"></i> 
	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
		<span class="close" onclick="del.close()">&times;</span>
		<p> Êtes-vous sûr de vouloir supprimer définitivement l\'article <span id="delSure"></span> <a href=""><strong id="delNon">NON</strong></a></span></td></tr></p>
	  </div>
	</div>
  
  ', "\n";
                }
            }

            ?>
        </table>
    </div>

    <table id="manageCommentaire">
        <tr>
            <th class="none">Auteur</th>
            <th>Contenu</th>
            <th class="none">Date d'ajout</th>
            <th class="none">Etat</th>
            <th>Nombres de signalements</th>
            <th>Action</th>
        </tr>


<?php

// Affichage liste commentaire
foreach ($listeComment as $com)
{
    // verifi l'etat du commentaire avec le nombres de signalements
    if ($com['etat'] > 1 ) { $codeN = 'Signaler';} else { $codeN = "Publier";}

    echo ' <tr><td class="none">', $com['auteur'], '</td><td><a href="comment-update-', $com['id'], '.html">', substr($com['contenu'], 0, 160), '</a></td><td class="none">le ', $com['date'], '</td><td class="none ', $codeN,'">', $codeN,'</td><td class="center"> ', $com['etat'],'</td>

    <td>

            <i class="fa fa-trash-o fa-2x" aria-hidden="true" onclick="del.boutonComment(', $com['id'], ');"></i>
            <!-- The Modal -->
            <div id="myModal2" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" onclick="del.close()">&times;</span>
                    <p> Êtes-vous sûr de vouloir supprimer définitivement le commentaire <span id="delSureComment"></span> <a href=""><strong id="delNon">NON</strong></a></span></td></tr></p>
    </div>
    </div>

    ', "\n";
}
?>
    </table>

</div>