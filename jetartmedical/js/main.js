// fixed menu
window.onscroll = function() {
	fixedMenu();
}
var header = document.getElementById("header");
var sticky = header.offsetTop;
function fixedMenu() {
	if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
	}else {
		header.classList.remove("sticky");
	}
}

/*dropdown menu ngôn ngữ tiếng việt, anh*/
function myFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(e) {
	if (!e.target.matches('.dropbtn')) {
	var myDropdown = document.getElementById("myDropdown");
	if (myDropdown.classList.contains('show')) {
		myDropdown.classList.remove('show');
		}
	}
}

/*change toggle*/
function toggle(x) {
	x.classList.toggle("change");
}

// smooth scroll
$(document).ready(function(){
	$("a").on('click', function(event) {
	if (this.hash !== "") {
		event.preventDefault();
		var hash = this.hash;
		$('html, body').animate({
			scrollTop: $(hash).offset().top
		}, 200, function(){
			window.location.hash = hash;
		});
	}
	});
});