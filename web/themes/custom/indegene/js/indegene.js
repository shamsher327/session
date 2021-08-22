jQuery(document).ready(function($){
	
var i = 0;
function change() {
	  var doc = document.getElementById("welcome_head");
	  var color = ["yellow", "blue", "brown", "green"];
	  
	  doc.style.color = color[i];
	  i = (i + 1) % color.length;
	}

setInterval(change, 1000);	
});