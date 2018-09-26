/**
 * Procédure qui permet de changer la couleur du fond en fonction du role mit en parametre 
 * param role de type int
*/
function get_color(role){ 
	if(role == 1){
		document.body.style.backgroundColor = "#FF8000"; // on change la couleur du background
		var elem = document.getElementById('entete'); // on recupere l'element entete
		elem.style.backgroundColor = "#FE9A2E"; // on surcharge le css avec une modification du background color avec une nouvelle couleur
	}
}