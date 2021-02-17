import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger.js';
gsap.registerPlugin(ScrollTrigger);

export default function loadingScreen() {

	// *********************** Loader Animation Cookie ******************
	//function to get the cookie
	function getCookie(cname) {
		var name = cname + '=';
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
			c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
			}
		}
		return '';
		}

	//function to check what the cookienotice is set to
	function checkCookie(cookieName) {
		var theCookieName = getCookie(cookieName);
		if (theCookieName != '') { // if cookie is not set
			return true;
		} else { // if cookie IS set
			return false;
		}
		}


	// putting it all together to create the cookie
	function createCookie(name, value, days) {
		var d = new Date();
		d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
		var expires = "expires=" + d.toUTCString();
		document.cookie = name + '=' + value + ';' + expires + ';path=/';
	}
	

    	// ******************* Home Title Animation ****************
	const beautiful = document.querySelector('.hello-beautiful.title .line-2');
    const hello = document.querySelector('.hello-beautiful.title .line-1');

	// Wrap every letter in a span
	hello.innerHTML = hello.textContent.replace( /\S/g,'<span class="hello-letter">$&</span>');
	beautiful.innerHTML = beautiful.textContent.replace( /\S/g, '<span class="beautiful-letter">$&</span>');

	function helloBeautiful() {
		var tl = gsap.timeline({
			delay: 2,
			ease:'expo.out',
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
		}, '-=0.4');
		return tl;
	}
	
	// **************** Loading Screen Animation *****************
	function loadingAnimation() {
		var tl = gsap.timeline({
			ease:'expo.out',
		})
		.fromTo('.loading-screen', {opacity: 1}, {
			opacity: 0,
			duration: 2,
			onComplete: () => {
				document.querySelector('.loading-screen').classList.remove('active');
				document.querySelector('.title.hello-beautiful').classList.add('done');
			}
		}, '+=1');
		// .fromTo('header', {opacity: 0}, {
		// 	opacity: 1,
		// 	duration: 2,
		// }, '-=2');
		return tl;
	}


	// **************** The 2 different animations as variables we can call ***********
	const titleTimeline = gsap.timeline({
		paused: true,
	})
	.add(helloBeautiful());

	const loadingTimeline = gsap.timeline({
		paused: true,
	})
	.add(helloBeautiful())
	.add(loadingAnimation());


	// ****************** Trigger either the animation or the cookie *************
	var loaderCookie = getCookie('frontpageLoad');

	if(loaderCookie) {
		document.querySelector('.loading-screen').classList.remove('active');
		titleTimeline.play();
		console.log('playing just the title');
	} else {
		loadingTimeline.play(); // Trigger Hello Animation
		createCookie('frontpageLoad', 'seen', 1);
		console.log('playing loading animation');
	}


}