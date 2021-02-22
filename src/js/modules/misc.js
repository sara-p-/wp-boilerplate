import { gsap } from 'gsap';
// import { ScrollTrigger, ScrollToPlugin } from 'gsap/all.js';
// gsap.registerPlugin(ScrollTrigger);
// gsap.registerPlugin(ScrollToPlugin);


export default function misc() {

	var arrow = document.querySelector('a.down');

	// Home Screen arrow bounce
	gsap.timeline({
		repeat: -1,
		duration: 0.75,
		// ease: 'Elastic.easeOut',
		yoyo: true,
	})
	.fromTo(arrow, {y: '-3em'}, {
		y: 0,
	});

	console.log(arrow);
	
}
