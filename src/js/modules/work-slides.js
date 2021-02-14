import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger.js";


gsap.registerPlugin(ScrollTrigger);

export default function workSlides() {
	console.log('gsap running');

	const items = document.querySelectorAll('.listing .item'); // Getting all the items
	const imagesLeft = [];
	const imagesRight = [];
	// Splitting the items into even and odd groups
	items.forEach((element, index) => {
		if((index + 1) % 2 == 0) { // Odd items are pushed into imagesLeft
			var imageRight = element.querySelector('.image');
			imagesRight.push(imageRight);
		} else { // Odd items are pushed into imagesLeft
			var imageLeft = element.querySelector('.image');
			imagesLeft.push(imageLeft);
		}
	});

	// setup the scrolling animation for odd items
	imagesLeft.forEach((element, index) => {
		var item = element.parentElement.parentElement.parentElement;
		gsap.fromTo(element, {x: '-100%'}, {
			duration: 1.2,
			x: '0%',
			scrollTrigger: {
				trigger: item,
				start: 'top 75%',
			}
		})
	});

	// setup the scrolling animation for even items
	imagesRight.forEach((element, index) => {
		var item = element.parentElement.parentElement.parentElement;
		gsap.fromTo(element, {x: '100%'}, {
			duration: 1.2,
			x: '0%',
			scrollTrigger: {
				trigger: item,
				start: 'top 50%',
			}
		})
	})

	
	
}
