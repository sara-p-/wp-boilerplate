import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger.js';
gsap.registerPlugin(ScrollTrigger);

export default function loadingScreen() {

    	// ******************* Home Title Animation ****************
	const beautiful = document.querySelector('.hello-beautiful.title .line-2');
    const hello = document.querySelector('.hello-beautiful.title .line-1');

	// Wrap every letter in a span
	hello.innerHTML = hello.textContent.replace( /\S/g,'<span class="hello-letter">$&</span>');
	beautiful.innerHTML = beautiful.textContent.replace( /\S/g, '<span class="beautiful-letter">$&</span>');

	const gsapHello = gsap.timeline({
		paused: true,
        ease: 'expo.out',
        delay: 2,
	})
	.fromTo('.hello-letter', {y: '-2em'}, {
		y: 0,
		duration: .5,
		stagger: 0.1,
	})
	.fromTo('.beautiful-letter', {y: '-4em'}, {
		y: 0,
		duration: .5,
		stagger: 0.1,
	}, '-=0.4')
    .fromTo('.loading-screen', {opacity: 1}, {
        opacity: 0,
        duration: 2,
        onComplete: () => {
            document.querySelector('.loading-screen').classList.remove('active');
            document.querySelector('.title.hello-beautiful').classList.add('done');
        }
	}, '+=1')
	.fromTo('header', {opacity: 0}, {
		opacity: 1,
		duration: 2,
	}, '-=2');

	// Trigger Hello Animation

		gsapHello.play();

}