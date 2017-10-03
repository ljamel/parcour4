<h2>Ajouter un article</h2>

<div id="ajout">
    <form action="" method="post" enctype="multipart/form-data">
        <p>
            <?= $form ?>

            <input type="hidden" name="MAX_FILE_SIZE" value="12345000000000"/>
            <input type="file" name="icone"/>
            <input class="bouton" type="submit" value="Ajouter"/>
        </p>
    </form>
</div>

<!-- Pour que tinymce soit activer que pour la page ajout article et modifier article -->
<script src="/parcour4/Sources_TP_App/tp-app-poo/Web/js/tinymce/js/tinymce/tinymce.js"></script>
<script src="/parcour4/Sources_TP_App/tp-app-poo/Web/js/tinymce.js"></script>
