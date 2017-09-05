/* Tinymce bloque l'envoie d'image quand j'utilise la version personnaliser */
tinymce.init({
    selector: 'textarea',
    skin: 'custom',
    height: 500,
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor',
    ],
    toolbar: 'insertfile link image | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',

    template_popup_width: 300
});
