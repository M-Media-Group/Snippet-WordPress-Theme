/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var element = document.getElementById("header_image");

	var exposeBackground = function (event) {

		// Prevents iOS from highlighting stuff when long pressing
		event.returnValue = false;

		element.classList.remove("bg-blur");
		element.classList.remove("has-background-dim");
		element.children[0].style.opacity = 0;
		element.children[1].style.display = "none";
	};

	var obscureBackground = function (event) {

		// Prevents iOS from highlighting stuff when long pressing
		event.returnValue = false;

		element.classList.add("bg-blur");
		element.classList.add("has-background-dim");
		element.children[0].style.opacity = null;
	};

	element.addEventListener('touchstart', exposeBackground, false);
	element.addEventListener('mousedown', exposeBackground, false);

	element.addEventListener('touchend', obscureBackground, false);
	element.addEventListener('mouseup', obscureBackground, false);
} )();
