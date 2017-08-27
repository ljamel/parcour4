function Accueil() {
	this.menuHead = "fixe";
	this.lastScroll = 0;

	this.scroll = function () {
	if(window.scrollY > 50) {
		console.log('bas50');
		document.getElementById('menu-header').style.display = "none";
		document.getElementById('menu-header-scrollBas').style.display = "block";
	}
	if(window.scrollY < 50) {
		console.log('bas50');
		document.getElementById('menu-header').style.display = "block";	
		document.getElementById('menu-header-scrollBas').style.display = "none";
	}
	console.log(window.scrollY);

	};
}
var menuAccueil = new Accueil();
window.addEventListener('scroll', menuAccueil.scroll, false);
