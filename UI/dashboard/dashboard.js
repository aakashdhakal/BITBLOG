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

	sideLinks[2].click();
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
function closePopup() {
	let popup = document.querySelector(".popup-box");
	popup.animate(
		[
			{ opacity: "1", transform: "scale(1)" },
			{ opacity: "0", transform: "scale(0.5)" },
		],
		{ duration: 200, fill: "forwards" }
	);
	setTimeout(() => {
		popup.close();
	}, 200);
}

function showPopUp(title, message, btnText, btnFunction) {
	let popup = document.querySelector(".popup-box");
	let popupTitle = document.querySelector(".popup-title");
	let popupMessage = document.querySelector(".popup-message");
	let confirmBtn = document.querySelector("#confirmBtn");
	popupTitle.textContent = title || "Title";
	popupMessage.textContent = message || "Message";
	confirmBtn.textContent = btnText || "Confirm";
	confirmBtn.addEventListener("click", () => {
		if (btnFunction) {
			console.log(btnFunction);
			window[btnFunction]();
		}
		closePopup();
	});
	popup.showModal();

	popup.animate(
		[
			{ opacity: "0", transform: "scale(0.5)" },
			{ opacity: "1", transform: "scale(1)" },
		],
		{ duration: 200, fill: "forwards" }
	);
}
let closePopupBtn = document.querySelector("#closePopup");
closePopupBtn.addEventListener("click", closePopup);
let cancelBtn = document.querySelector("#cancelBtn");
cancelBtn.addEventListener("click", closePopup);

let logoutBtn = document.querySelector("#logoutBtn");
logoutBtn.addEventListener("click", () => {
	showPopUp(
		"Are you sure to log out?",
		"Your changes may not be saved. Do you want to continue?",
		"Logout",
		"logout"
	);
});

function logout() {
	window.location.href = "/A.D-Blogs/logout";
}

//Blog editor function

function blogEditor() {
	const quill = new Quill("#editor", {
		modules: {
			toolbar: {
				container: "#toolbar",
				handlers: {
					link: function () {
						let urlInput = document.querySelector(".url-input");
						urlInput.show();
					},
				},
			},
			syntax: true,
		},
		placeholder: "Write something awesome...",
	});

	//set js code to quill

	//properly escape html tags
	quill.on("text-change", function () {
		let html = quill.getSemanticHTML();
		let clean = DOMPurify.sanitize(html, { USE_PROFILES: { html: true } });
		clean = clean.replace(/<p><\/p>/g, "<br><br>");
		console.log(clean);

		let delta = quill.getContents();
		delta = JSON.stringify(delta);
		console.log(delta);
	});

	//upload image
	let uploadBtn = document.querySelector("#uploadCover");
	let removeBtn = document.querySelector("#removeCover");
	let preview = document.querySelector(".cover-img");
	let fileInput = document.querySelector("#coverImgUpload");

	uploadBtn.addEventListener("click", () => {
		fileInput.click();
	});

	removeBtn.addEventListener("click", () => {
		removeCover();
	});

	fileInput.addEventListener("change", () => {
		let file = fileInput.files[0];
		if (file) {
			addCover(file);
		}
	});

	function addCover(file) {
		let reader = new FileReader();
		reader.onloadend = function () {
			preview.src = reader.result;
			preview.style.display = "block";
			uploadBtn.classList.add("change-btn");
			uploadBtn.innerHTML =
				"<i class='fa-solid fa-pen-to-square'></i> Change cover";
		};
		reader.readAsDataURL(file);
		removeBtn.style.display = "flex";
	}

	function removeCover() {
		preview.src = "";
		preview.style.display = "none";
		uploadBtn.classList.remove("change-btn");
		uploadBtn.innerHTML =
			"<i class='fa-solid fa-upload'></i> Upload Cover Image";
		removeBtn.style.display = "none";
		fileInput.value = "";
	}
}

//adminHome function
function adminHome() {
	console.log("adminHome");
	let showPopup = document.querySelector("#showPopup");
	showPopup.addEventListener("click", () => {
		showPopUp("Title", "Message", "Confirm", "posts");
	});
}

//posts function
function posts() {
	console.log("posts");
}

//settings function
function settings() {
	console.log("settings");
}
