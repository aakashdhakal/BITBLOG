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
	let urlDialog = document.querySelector(".url-input");
	let urlInput = document.querySelector(".url-input input");
	let insertLink = document.querySelector(".url-input button");
	const quill = new Quill("#editor", {
		modules: {
			toolbar: {
				container: "#toolbar",
				handlers: {
					link: function () {
						urlDialog.show();

						function insertLinkFunc() {
							console.log("insertLinkFunc");
							let value = urlInput.value;
							if (value) {
								quill.format("link", value);
								urlInput.value = "";
								urlDialog.close();
							}
						}

						insertLink.addEventListener("click", insertLinkFunc);
						urlInput.addEventListener("keypress", (e) => {
							if (e.key === "Enter") {
								console.log("Enter");
								insertLinkFunc();
							}
						});

						window.addEventListener("keydown", (e) => {
							console.log(e.key);
							if (e.key === "Escape") {
								urlDialog.close();
							}
						});
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
	let coverBtnContainer = document.querySelector(".cover-upload-btn");
	let coverDetails = document.querySelector(".cover-details");
	let coverImgContainer = document.querySelector(".add-cover");

	function loadingBtn(status, btn, textAfterLoading) {
		if (status) {
			btn.innerHTML = "<i class='fa-solid fa-spinner-third'></i>";
			btn.disabled = true;
		} else {
			btn.innerHTML = textAfterLoading;
			btn.disabled = false;
		}
	}
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

	coverImgContainer.addEventListener("dragover", (e) => {
		e.preventDefault();
	});

	coverImgContainer.addEventListener("dragleave", (e) => {
		e.preventDefault();
	});

	coverImgContainer.addEventListener("drop", (e) => {
		e.preventDefault();
		coverImgContainer.classList.remove("dragover");
		let file = e.dataTransfer.files[0];
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
			uploadBtn.innerHTML = "<i class='fa-solid fa-pen-to-square'></i>";
		};
		reader.readAsDataURL(file);
		removeBtn.style.display = "flex";
		coverBtnContainer.classList.add("cover-img-show-btns");
		coverDetails.style.display = "none";
	}

	function removeCover() {
		preview.src = "";
		preview.style.display = "none";
		uploadBtn.classList.remove("change-btn");
		uploadBtn.innerHTML =
			"<i class='fa-solid fa-upload'></i> Upload Cover Image";
		removeBtn.style.display = "none";
		fileInput.value = "";
		coverBtnContainer.classList.remove("cover-img-show-btns");
		coverDetails.style.display = "flex";
	}

	//post the blog as draft or published

	let publishBtn = document.querySelector("#publishPost");
	let draftBtn = document.querySelector("#saveDraft");

	function postBlog(status) {
		let title = document.querySelector("#postTitle").value;
		let content = quill.getSemanticHTML();
		let quillDelta = quill.getContents();
		quillDelta = JSON.stringify(quillDelta);
		let cover = fileInput.files[0];
		let formData = new FormData();
		formData.append("title", title);
		formData.append("content", content);
		formData.append("cover", cover);
		formData.append("status", status);
		formData.append("quillDelta", quillDelta);

		console.log(formData);

		//send data to server
		fetch("/A.D-Blogs/publish-post", {
			method: "POST",
			body: formData,
		})
			.then((response) => response.text())
			.then((data) => {
				console.log(data);
				if (data === "success") {
					showPopUp(
						"Success",
						"Your blog has been posted successfully",
						"Ok",
						"posts"
					);
				} else {
					showPopUp(
						"Error",
						"Something went wrong. Please try again. Error" + data,
						"OK"
					);
				}
			});
	}
	publishBtn.addEventListener("click", () => {
		loadingBtn(true, publishBtn, "Publish");
		postBlog(1);
		loadingBtn(false, publishBtn, "Publish");
	});

	draftBtn.addEventListener("click", () => {
		loadingBtn(true, draftBtn, "Save Draft");
		postBlog(0);
		loadingBtn(false, draftBtn, "Save Draft");
	});
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
