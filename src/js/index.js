import "../scss/main.scss";


import vue from "./components/vue";
import styleGuide from "./components/styleguide";

import menu from "./modules/menu";
import titles from "./modules/titles";
import workSlides from "./modules/work-slides";
import loadingScreen from "./modules/loader";
// import misc from "./modules/misc";


import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/all.js";
gsap.registerPlugin(ScrollToPlugin);
 

document.addEventListener("DOMContentLoaded", function () {
	vue();
	styleGuide();

	gsap.to(window, {
		duration: 0,
		scrollTo: 0,
	});


	loadingScreen();

	menu();
	titles();
	workSlides();
	// misc();



});
