var $ = require("jquery");

export default function menu() {
	console.log("menu js loaded");

	const hamburger = document.querySelector(".hamburger-menu");
	const toggle = $(".nav-toggle");

	// **************** Menus and Scrolling to Links ****************
	// SmoothScroll to bookmarks
	$(function () {
		$('a[href*="#"]')
			.not('a[href="#"]')
			.on("click", function (event) {
				if (
					location.pathname.replace(/^\//, "") ==
						this.pathname.replace(/^\//, "") &&
					location.hostname == this.hostname
				) {
					target = $(this.hash);
					target = target.length
						? target
						: $("[name=" + this.hash.slice(1) + "]");
					if (target.length) {
						$("html,body").animate(
							{
								scrollTop: target.offset().top + -100,
							},
							875,
							function () {
								console.log(target.offset());
								target.attr("tabindex", "-1");
								target.focus();
							}
						);
						location.hash = target;
						return false;
					}
				}
			});
	});

	// Mobile Menu - Open
	toggle.click(function (e) {
		e.preventDefault();
		$(this).toggleClass("open");
		$(".hamburger-menu").toggleClass("open");
	});

	// Closing Mobile menu on link click
	var mobileLinks = $(".mobile-menu a");
	mobileLinks.each(function () {
		$(this).on("click", function (e) {
			toggle.removeClass("open");
			$(".hamburger-menu").removeClass("open");
		});
	});
}
