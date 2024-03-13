const baseUrl = "/A.D-Blogs/";
//Preloader Script

let preloader = document.querySelector(".preloader");
window.addEventListener("load", () => {
	setTimeout(() => {
		preloader.animate({ opacity: "0" }, 1000);
	}, 1000);
	setTimeout(() => {
		preloader.style.display = "none";
	}, 2000);
});

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
	fetch(baseUrl + "feedback-config", {
		method: "POST",
		headers: {
			"Content-Type": "application/x-www-form-urlencoded",
		},
		body:
			"message=" +
			encodeURIComponent(feedback.value) +
			"&email=" +
			encodeURIComponent(feedbackEmail.value),
	})
		.then((response) => response.text())
		.then((data) => {
			if (data === "success") {
				feedbackBtn.innerHTML = '<i class="fa-duotone fa-check"></i>';
				setTimeout(() => {
					showAlert("success", "Thank you for your feedback!");
					feedbackBtn.innerHTML = "Send";
					feedbackBtn.disabled = false;
					feedbackForm.reset();
				}, 1000);
			} else {
				showAlert("error", "Something went wrong. Please try again later.");
				feedbackBtn.innerHTML = "Send";
				feedbackBtn.disabled = false;
				return;
			}
		});
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
			element.src = baseUrl + "images/akash-dark.svg";
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
			element.src = baseUrl + "images/akash.svg";
		});
	} else {
		bodyElement.classList.add("dark");
		localStorage.setItem(localStorageKey, "dark");
		themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
		themeToggle.style.animation = "rotate 1s ease"; // Fix the animation property
		logo.forEach((element) => {
			element.src = baseUrl + "images/akash-dark.svg";
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

//Follow Script
let followBtn = document.querySelectorAll("#followBtn");

followBtn.forEach(function (button) {
	button.addEventListener("click", () => {
		button.innerHTML = '<i class="fa-duotone fa-spinner-third fa-spin"></i>';
		button.disabled = true;
		let author = button.getAttribute("data-author");
		let action = button.classList.contains("not-followed")
			? "follow"
			: "unfollow";

		fetch(baseUrl + "follow-config", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: `author=${author}&action=${action}`,
		})
			.then((response) => {
				if (!response.ok) {
					throw new Error("Network response was not ok");
				}
				return response.text();
			})
			.then((data) => {
				if (data === "success") {
					if (action === "follow") {
						button.innerHTML = "Following";
						button.classList.remove("not-followed");
						button.classList.add("followed");
						button.disabled = false;
						showAlert("success", "You are now following " + author);
					} else if (action === "unfollow") {
						button.innerHTML = "Follow";
						button.classList.remove("followed");
						button.classList.add("not-followed");
						button.disabled = false;
						showAlert("warning", "You unfollowed " + author);
					}
				} else if (data === "login") {
					showAlert("warning", "Please login to follow the author");
					button.innerHTML = "Follow";
					button.disabled = false;
				} else if (data === "same") {
					showAlert("error", "You cannot follow yourself");
					button.innerHTML = "Follow";
					button.disabled = false;
				} else {
					showAlert(
						"error",
						"Something went wrong. Please try again later. " + data
					);
					button.innerHTML = "Follow";
					button.disabled = false;
				}
			})
			.catch((error) => {
				console.error(
					"There has been a problem with your fetch operation:",
					error
				);
			});
	});
});

followBtn.forEach(function (button) {
	button.addEventListener("mouseover", () => {
		if (button.classList.contains("followed")) {
			button.innerHTML = "Unfollow";
			button.classList.add("unfollow");
		} else {
			button.classList.remove("unfollow");
		}
	});
});

followBtn.forEach(function (button) {
	button.addEventListener("mouseout", () => {
		button.classList.remove("unfollow");

		if (button.classList.contains("followed")) {
			button.innerHTML = "Following";
		} else if (button.classList.contains("not-followed")) {
			button.innerHTML = "Follow";
		}
	});
});

//alert function

let alertBox = document.querySelector(".alert-box");
let alertContainer = document.querySelector(".alert-box-container");

function showAlert(state, message) {
	let newAlert = alertBox.cloneNode(true);
	let alertMessage = newAlert.querySelector("#alertMessage");
	let alertIcon = newAlert.querySelector("i");

	newAlert.classList.add(state);
	alertMessage.innerHTML = message;
	newAlert.classList.add("show-alert");

	switch (state) {
		case "success":
			alertIcon.className = "fa-duotone fa-circle-check";
			alertIcon.style.setProperty("--fa-primary-color", "#000000");
			alertIcon.style.setProperty("--fa-secondary-color", "#00ff00");
			alertIcon.style.setProperty("--fa-secondary-opacity", "0.4");
			break;
		case "error":
			alertIcon.className = "fa-duotone fa-circle-xmark";
			alertIcon.style.setProperty("--fa-primary-color", "#000000");
			alertIcon.style.setProperty("--fa-secondary-color", "#ff0000");
			alertIcon.style.setProperty("--fa-secondary-opacity", "0.4");
			break;
		case "warning":
			alertIcon.className = "fa-duotone fa-circle-exclamation";
			alertIcon.style.setProperty("--fa-primary-color", "#000000");
			alertIcon.style.setProperty("--fa-secondary-color", "#ffc800");
			alertIcon.style.setProperty("--fa-secondary-opacity", "0.9");
			break;
	}

	// Add the new alert to the body
	alertContainer.appendChild(newAlert);

	setTimeout(() => {
		animation = newAlert.animate({ opacity: "0" }, 1000);
		animation.onfinish = () => {
			newAlert.remove();
		};
	}, 5000);
}

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
