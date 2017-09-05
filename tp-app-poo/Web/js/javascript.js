function Accueil() {
    this.menuHead = "fixe";
    this.lastScroll = 0;

    this.scroll = function () {
        if (window.scrollY > 50) {
            document.getElementById('menu-header').style.display = "none";
            document.getElementById('menu-header-scrollBas').style.display = "block";
        }
        if (window.scrollY < 50) {
            document.getElementById('menu-header').style.display = "block";
            document.getElementById('menu-header-scrollBas').style.display = "none";
        }

    };
    // Demande de confiramtion de supression de fichiers
    this.bouton = function (ad) {
        document.getElementById('myModal').style.visibility = "visible";
        document.getElementById('delSure').innerHTML = '<a href=news-delete-' + ad + '.html id="delSure">OUI';
    };

    // When the user clicks on <span> (x), close the modal
    this.close = function () {
        document.getElementById('myModal').style.visibility = "hidden";
    };

    this.$_GET = function (param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }

}
var menuAccueil = new Accueil();
var del = new Accueil();
var suivant = new Accueil();
window.addEventListener('scroll', menuAccueil.scroll, false);


console.log( suivant.$_GET('pageSuivante'));