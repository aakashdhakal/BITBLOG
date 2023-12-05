let articleButtons = document.querySelector(".article-buttons");

window.addEventListener("scroll", function () {
	if (window.scrollY > 100) {
		articleButtons.style.position = "sticky";
	} else {
		articleButtons.style.position = "static";
	}
});
