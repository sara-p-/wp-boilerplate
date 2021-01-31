import anime from "animejs/lib/anime.es.js";
require('waypoints/lib/noframework.waypoints.min');
var $ = require("jquery");

export default function animations() {
	// ******************* Home Title Animation ****************
	const beautiful = document.querySelector(".hello-beautiful.title .line-2");
	const hello = document.querySelector(".hello-beautiful.title .line-1");

	// Wrap every letter in a span
	hello.innerHTML = hello.textContent.replace(
		/\S/g,
		"<span class='hello-letter'>$&</span>"
	);
	beautiful.innerHTML = beautiful.textContent.replace(
		/\S/g,
		"<span class='beautiful-letter'>$&</span>"
	);

	const helloB = anime.timeline({
		loop: false,
		autoplay: false,
		duration: 2000,
		easing: "easeOutExpo",
	});

	helloB
		.add({
			targets: ".hello-letter",
			translateY: ["-2em", 0],
			translateZ: 0,
			delay: anime.stagger(100),
		})
		.add(
			{
				targets: ".beautiful-letter",
				translateY: ["-4em", 0],
				translateZ: 0,
				delay: anime.stagger(100),
			},
			0
		);

	// Trigger Hello Animation
	$(function () {
		console.log("hello animation");
		helloB.play();
	});

	// ******************* Titles Animation ****************
	let titleAnimations = []; // Create empty array to hold our anime objects
	const titles = document.querySelectorAll(
		"section.animate-title h1.title span.line"
	); // Grab the titles set to animate

	titles.forEach((title, index) => {
		// Loop through titles
		title.innerHTML = title.textContent.replace(
			/\S/g,
			`<span class='title-${index}-letter'>$&</span>`
		); // split each letter into it's own span
		var section = title.closest("section").id; // Grab the ids of the sections that contain the titles
		titleAnimations[index] = anime({
			// Create the anime object
			loop: false,
			autoplay: false,
			duration: 2000,
			easing: "easeOutExpo",
			targets: `.title-${index}-letter`,
			translateY: ["-2em", 0],
			translateZ: 0,
			delay: anime.stagger(100),
		});
		new Waypoint({
			// Create the waypoints
			element: document.getElementById(section),
			handler: (direction) => {
				if (direction == "down") {
					titleAnimations[index].restart();
				}
			},
			offset: "75%",
		});
	});
}
