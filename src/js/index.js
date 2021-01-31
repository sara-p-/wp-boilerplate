import "../scss/main.scss";

// import AOS from 'aos';
// import 'aos/dist/aos.css';

import vue from "./components/vue";
import styleGuide from "./components/styleguide";

import menu from "./modules/menu";
import animations from "./modules/animations";


document.addEventListener("DOMContentLoaded", function () {
	vue();
	styleGuide();

	menu();
	animations();

	// AOS.init({
	// 	duration: 1200,
	//   });
});
