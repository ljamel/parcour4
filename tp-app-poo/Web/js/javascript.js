function Accueil(e) {
	this.id = e;
	this.menuHead = "fixe";
	this.lastScroll = 0;

	this.scroll = function () {
		if (window.scrollY > 50) {
			console.log('bas50');
			document.getElementById('menu-header').style.display = "none";
			document.getElementById('menu-header-scrollBas').style.display = "block";
		}
		if (window.scrollY < 50) {
			console.log('bas50');
			document.getElementById('menu-header').style.display = "block";
			document.getElementById('menu-header-scrollBas').style.display = "none";
		}
		console.log(window.scrollY);

	};
	// When the user clicks the button, open the modal 
	this.bouton = function (ad) {
		document.getElementById('myModal').style.visibility = "visible";
		document.getElementById('delSure').innerHTML = '<a href=news-delete-'+ ad +'.html id="delSure">OUI';
	}

	// When the user clicks on <span> (x), close the modal
	this.close = function () {
		document.getElementById('myModal').style.visibility = "hidden";
	}


}
var menuAccueil = new Accueil();
var del = new Accueil();
window.addEventListener('scroll', menuAccueil.scroll, false);
