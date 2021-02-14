import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";
gsap.registerPlugin(ScrollTrigger);

export default function titles() {


	// ******************* Titles Animation ****************
	const titleAnimations = [];
	const titles = document.querySelectorAll( "section.animate-title h1.title span.line" ); // Grab the titles set to animate

	titles.forEach((title, index) => { // Loop through titles
		title.innerHTML = title.textContent.replace( /\S/g, `<span class='title-${index}-letter'>$&</span>`); // split each letter into it's own span
		var section = title.closest("section"); // Grab the sections that contain the titles
		titleAnimations[index] = gsap.fromTo(`.title-${index}-letter`, { y: '-2em'}, {
			// duration: 2,
			stagger: 0.1,
			y: 0,
			scrollTrigger: {
				trigger: section,
				start: 'top 50%',
			}
		})
	});
	
}
