// Feedback Form Script

let feedbackBtn = document.getElementById("feedbackBtn");
let feedbackForm = document.getElementById("feedbackForm");
let feedbackEmail = document.getElementById("feedbackEmail");
let feedback = document.getElementById("feedback");

feedbackForm.addEventListener("submit", function (e) {
	e.preventDefault();
	feedbackBtn.disabled = true; // Corrected variable name and property

	setTimeout(() => {
		feedbackBtn.innerHTML =
			'<i class="fa-duotone fa-spinner-third fa-spin"></i>';
	}, 1000);
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "feedback-config.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			if (xhr.responseText === "success") {
				feedbackBtn.innerHTML = '<i class="fa-duotone fa-check"></i>';
				setTimeout(() => {
					feedbackBtn.innerHTML = "Send";
					feedbackBtn.disabled = false;
					feedbackForm.reset();
				}, 1000);
			} else {
				alert(xhr.responseText);
				feedbackBtn.innerHTML = "Send";
				feedbackBtn.disabled = false;
				return;
			}
		}
	};
	xhr.send(
		"message=" +
			encodeURIComponent(feedback.value) + // Corrected variable name
			"&email=" +
			encodeURIComponent(feedbackEmail.value) // Corrected variable name
	);
});

// Scroll to Top Script

let scrollToTop = document.getElementById("scrollToTop");

window.addEventListener("scroll", () => {
	if (window.scrollY > 150) {
		scrollToTop.style.animation = "appear 1s ease ";
		scrollToTop.style.display = "block";
	} else {
		scrollToTop.style.animation = "disappear 0.5s ease ";
	}
});

scrollToTop.addEventListener("animationend", () => {
	if (window.scrollY < 150) {
		scrollToTop.style.display = "none";
	}
	scrollToTop.innerHTML = '<i class="fa-solid fa-up"></i>';
});

scrollToTop.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth",
	});
	scrollToTop.innerHTML = '<i class="fa-duotone fa-spinner-third fa-spin"></i>';
});

// Theme Toggle Script

let themeToggle = document.getElementById("themeToggle");
let bodyElement = document.getElementsByTagName("body")[0];
let localStorageKey = "theme";
let logo = document.querySelectorAll(".logo-image");

let initialTheme = localStorage.getItem(localStorageKey);
if (initialTheme) {
	bodyElement.classList.add(initialTheme);
	if (initialTheme === "dark") {
		themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
		logo.forEach((element) => {
			element.src = "images/akash-dark.svg";
		});
	}
}

themeToggle.addEventListener("click", () => {
	if (bodyElement.classList.contains("dark")) {
		bodyElement.classList.remove("dark");
		localStorage.setItem(localStorageKey, "light");
		themeToggle.innerHTML = '<i class="fa-solid fa-moon"></i>';
		themeToggle.style.animation = "rotate 1s ease"; // Fix the animation property
		logo.forEach((element) => {
			element.src = "images/akash.svg";
		});
	} else {
		bodyElement.classList.add("dark");
		localStorage.setItem(localStorageKey, "dark");
		themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
		themeToggle.style.animation = "rotate 1s ease"; // Fix the animation property
		logo.forEach((element) => {
			element.src = "images/akash-dark.svg";
		});
	}
});

themeToggle.addEventListener("animationend", () => {
	themeToggle.style.animation = "";
});

//HamBurger Menu Script

var nav = document.querySelector(".bottom-nav");
var hamburgerMenu = document.querySelector(".hamburger-menu");
var bars = document.querySelectorAll(".bar");

hamburgerMenu.addEventListener("click", function () {
	// Toggle "active" class on hamburger menu
	hamburgerMenu.classList.toggle("active");

	// Toggle "open" class on bars to animate them
	bars[0].classList.toggle("active-bar-1");
	bars[1].classList.toggle("active-bar-2");
	bars[2].classList.toggle("active-bar-3");

	nav.classList.toggle("nav-extend");
	if (nav.classList.contains("nav-extend")) {
		bodyElement.style.overflow = "hidden";
	} else {
		bodyElement.style.overflow = "auto";
	}
});
//Sub Menu Script

let menu = document.getElementById("subMenu");
let img = document.getElementById("userProfile");
img.addEventListener("click", () => {
	menu.classList.toggle("extend");
});
document.addEventListener("click", function (event) {
	if (event.target.closest("#subMenu") || event.target.closest("#userProfile"))
		return;
	menu.classList.remove("extend");
});

let notification = document.getElementById("notificationMenu");
let notificationBtn = document.getElementById("notificationBtn");
notificationBtn.addEventListener("click", () => {
	notification.classList.toggle("extend");
});
document.addEventListener("click", function (event) {
	if (
		event.target.closest("#notificationMenu") ||
		event.target.closest("#notificationBtn")
	)
		return;
	notification.classList.remove("extend");
});
