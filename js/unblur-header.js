/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	let timer;
	let element = document.getElementById("header_image");

	var exposeBackground = function () {

		element.classList.remove("bg-blur");
		element.classList.remove("has-background-dim");

		element.children[0].style.opacity = 0;
		element.children[1].style.display = "none";
	};

	var obscureBackground = function () {

		element.classList.add("bg-blur");
		element.classList.add("has-background-dim");
		element.children[0].style.opacity = null;
	};

	function cancel(event) {
		document.body.style['-webkit-user-select'] = null;
		clearTimeout(timer);
		obscureBackground(element);
	}

	if(element !== null) {
	  element.addEventListener('touchstart', (event) => {
	    timer = setTimeout(() => {
	      timer = null;
	      // Prevents iOS from highlighting stuff when long pressing
	  	  document.body.style['-webkit-user-select'] = 'none';

	      exposeBackground();
	    }, 300);
	  });


	  element.addEventListener('touchend', cancel);
	  element.addEventListener('touchmove', cancel);


		// element.addEventListener('touchstart', exposeBackground, false);
		element.addEventListener('mousedown', exposeBackground, false);

		// element.addEventListener('touchend', obscureBackground, false);
		element.addEventListener('mouseup', obscureBackground, false);
	}
} )();
