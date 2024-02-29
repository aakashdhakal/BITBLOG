let collapseBtn = document.querySelector("#collapseSidenav");
let sidenav = document.querySelector("header");
let main = document.querySelector("main");
let collapseText = document.querySelectorAll(".side-nav-text");
let sideLinks = document.querySelectorAll(".side-nav li a");
let sideLinksIcons = document.querySelectorAll(".side-nav li a i");
let activeLink = document.querySelector(".side-nav li a.active");
let body = document.querySelector("body");
let mainContent = document.querySelector(".main-content");
let createPostBtn = document.querySelector("#createPost");
let activePageName = document.querySelector(".active-page-name");
let added = 0;

collapseBtn.addEventListener("click", () => {
	sidenav.classList.toggle("collapse");
	if (sidenav.classList.contains("collapse")) {
		collapseBtn.title = "Expand Menu";
		sidenav.animate([{ width: "11dvw" }, { width: "3dvw" }], {
			duration: 200,
			fill: "forwards",
		});
		main.style.marginLeft = "3dvw";
		collapseText.forEach((text) => {
			text.animate(
				[
					{ display: "block", opacity: "1" },
					{ display: "none", opacity: "0" },
				],
				{
					duration: 110,
					fill: "forwards",
				}
			);
		});
		localStorage.setItem("collapse", "true");
	} else {
		collapseBtn.title = "Collapse Menu";
		sidenav.animate([{ width: "3dvw" }, { width: "11dvw" }], {
			duration: 200,
			fill: "forwards",
		});
		collapseText.forEach((text) => {
			text.animate(
				[
					{ display: "none", opacity: "0" },
					{ display: "block", opacity: "1" },
				],
				{
					duration: 110,
					fill: "forwards",
				}
			);
		});
		main.style.marginLeft = "11dvw";
		localStorage.setItem("collapse", "false");
	}
});

let preloader = document.querySelector(".preloader");
window.addEventListener("load", () => {
	body.style.overflow = "hidden";
	setTimeout(() => {
		preloader.animate(
			[
				{ opacity: "1", display: "flex" },
				{ opacity: "0", display: "none" },
			],
			{ duration: 1100, fill: "forwards" }
		);
	}, 1100);
	setTimeout(() => {
		body.style.overflow = "auto";
	}, 1100);

	let colapse = localStorage.getItem("collapse");
	if (colapse === "true") {
		collapseBtn.click();
	}

	sideLinks[0].click();
});

sideLinks.forEach((link) => {
	link.addEventListener("click", (e) => {
		e.preventDefault();
		let pageUrl = link.getAttribute("href");
		activeLink.classList.remove("active");
		activeLink = link;
		link.classList.add("active");
		changeMainContent(pageUrl);
		activePageName.textContent = link.getAttribute("data-title");
		document.title = link.getAttribute("data-title") + " - BITBLOGS";

		let functionName = link.getAttribute("data-function");
		setTimeout(() => {
			if (functionName) {
				window[functionName]();
			}
		}, 100);
	});
});

function changeMainContent(pageUrl) {
	fetch(pageUrl)
		.then((response) => response.text())
		.then((data) => {
			mainContent.innerHTML = data;
		});
}

//Blog editor function

function blogEditor() {
	console.log("blogEditor");
	const quill = new Quill("#editor", {
		theme: "snow",
	});
}

//adminHome function
function adminHome() {
	console.log("adminHome");
}

//posts function
function posts() {
	console.log("posts");
}

//settings function
function settings() {
	console.log("settings");
}
