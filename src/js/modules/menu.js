import { gsap } from 'gsap';
import { ScrollTrigger, ScrollToPlugin } from 'gsap/all.js';
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(ScrollToPlugin);


export default function menu() {

	const hamburger = document.querySelector('.hamburger-menu');
	const toggle = document.querySelector('.nav-toggle');
	const menuLinks = document.querySelectorAll('header a[href*="#"]:not([href="#"])');


	// For each menu link, on click, scroll to section (also change the focus for accessibility)
	menuLinks.forEach((element) => {
		element.addEventListener('click', () => {
			var section = document.querySelector(element.hash); // Grab the section that matches the link hash
			gsap.to(window, {
				duration: 0.3,
				scrollTo: {
					y: element.hash,
					offsetY: 74,
				},
				ease: 'linear',
				onComplete: () => {
					var focusElement = section.querySelector('a');
					if(focusElement == null) {
						focusElement = section.querySelector('.title');
					}
					focusElement.focus({preventScroll: true}); // Change the focus to the scrolled-to element

					menuLinks.forEach((element) => { // Remove all of the 'active' classes on links
						element.classList.remove('active');
					});
					element.classList.add('active'); // Add 'active' class on clicked link
				}
			});
		})
	});

	// The toggle button animation
	const toggleAnimation = gsap.timeline({
		paused: true,
		loop: false,
	})
	.to('.toggle-bar-1', {
		rotate: '45deg',
		duration: 1,
	})
	.to('.toggle-bar-2', {
		x: '100%',
		duration: 1,
	}, '-=1')
	.to('.toggle-bar-3', {
		rotate: '-45deg',
		duration: 1
	}, '-=1');


	//  Function to toggle the animation
	toggleAnimation.reversed(true); // set the reversed property to true

	function toggleDirection(animation) { 	// toggle function
		animation.reversed() ? animation.play() : animation.reverse();
	}
	

	// Mobile Menu - Open and close
	toggle.addEventListener('click', (e) => {
		e.preventDefault();
		toggleDirection(toggleAnimation);
		hamburger.classList.toggle('open');
	});


	// Closing Mobile menu on link click
	var mobileLinks =  document.querySelectorAll('.mobile-menu a');
	mobileLinks.forEach((element) => {
		element.addEventListener('click', () => {
			toggleDirection(toggleAnimation);			
			hamburger.classList.toggle('open');
		})
	})
	
}
