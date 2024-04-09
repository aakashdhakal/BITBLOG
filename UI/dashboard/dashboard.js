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
let topNav = document.querySelector(".top-nav");
let added = 0;

window.addEventListener("scroll", () => {
	if (window.scrollY > 0) {
		topNav.classList.add("scrolled");
	} else {
		topNav.classList.remove("scrolled");
	}
});

collapseBtn.addEventListener("click", () => {
	sidenav.classList.toggle("collapsed");
	if (sidenav.classList.contains("collapsed")) {
		localStorage.setItem("collapse", "true");
		collapseBtn.title = "Expand Menu";
	} else {
		localStorage.setItem("collapse", "false");
		collapseBtn.title = "Collapse Menu";
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
		let functionName = link.getAttribute("data-function");
		changeMainContent(pageUrl, functionName);
		activePageName.textContent = link.getAttribute("data-title");
		document.title = link.getAttribute("data-title") + " - BITBLOGS";
	});
});

function changeMainContent(pageUrl, functionName) {
	fetch(pageUrl)
		.then((response) => response.text())
		.then((data) => {
			mainContent.innerHTML = data;
			window[functionName]();
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
	let formulaDialog = document.querySelector(".formula-input");
	let formulaInput = document.querySelector(".formula-input input");
	let imageDialog = document.querySelector(".image-input");
	let imageInput = document.querySelector(".image-input input");
	let imgUploadBtn = document.querySelector(".file-select-button");
	let imgFromUrl = document.querySelector("#imageLinkUrl");
	let cancelBtn = document.querySelectorAll("#cancelUrl");
	let savedSelection = null;
	let html;
	const quill = new Quill("#editor", {
		modules: {
			toolbar: {
				container: "#toolbar",
				handlers: {
					link: function () {
						urlDialog.show();
						formulaDialog.close();
						imageDialog.close();

						function insertLinkFunc() {
							console.log("insertLinkFunc");
							let value = urlInput.value;
							if (value) {
								quill.format("link", value);
								urlInput.value = "";
								urlDialog.close();
							}
						}

						cancelBtn[0].addEventListener("click", () => {
							urlDialog.close();
						});
						urlInput.addEventListener("keypress", (e) => {
							if (e.key === "Enter") {
								insertLinkFunc();
							}
						});

						window.addEventListener("keydown", (e) => {
							if (e.key === "Escape") {
								urlDialog.close();
							}
						});
					},
					formula: function () {
						formulaDialog.show();
						urlDialog.close();
						imageDialog.close();

						function insertFormulaFunc() {
							console.log("insertFormulaFunc");
							let value = formulaInput.value;
							if (value) {
								if (savedSelection) {
									quill.setSelection(savedSelection);
									quill.insertEmbed(savedSelection.index, "formula", value);
									formulaInput.value = "";
									formulaDialog.close();
								} else {
									console.log("No selection in the Quill editor");
								}
							}
						}

						cancelBtn[1].addEventListener("click", () => {
							formulaDialog.close();
						});
						formulaInput.addEventListener("keypress", (e) => {
							if (e.key === "Enter") {
								insertFormulaFunc();
							}
						});

						window.addEventListener("keydown", (e) => {
							if (e.key === "Escape") {
								formulaDialog.close();
							}
						});
					},
					image: function () {
						imageDialog.show();
						urlDialog.close();
						formulaDialog.close();

						imgUploadBtn.addEventListener("click", () => {
							imageInput.click();
						});

						function insertImageFunc(file) {
							if (file) {
								if (savedSelection) {
									quill.setSelection(savedSelection);
									quill.insertEmbed(savedSelection.index, "image", file);
									imageDialog.close();
								} else {
									console.log("No selection in the Quill editor");
								}
							}
						}
						imgFromUrl.addEventListener("keypress", (e) => {
							if (e.key === "Enter") {
								insertImageFunc(imgFromUrl.value);
							}
						});
						imageInput.addEventListener("change", () => {
							imgUploadBtn.innerHTML =
								"Uploading  <i class='fa-solid fa-spinner-third'></i>";
							let formData = new FormData();
							formData.append("image", imageInput.files[0]);
							formData.append("action", "upload");

							fetch("/A.D-Blogs/handle-image", {
								method: "POST",
								body: formData,
							})
								.then((response) => response.text())
								.then((data) => {
									insertImageFunc(data);
								});
							imgUploadBtn.innerHTML =
								"<i class='fa-solid fa-up-to-bracket'></i>Upload Image";
						});

						window.addEventListener("keydown", (e) => {
							if (e.key === "Escape") {
								imageDialog.close();
							}
						});
					},
				},
			},
			syntax: true,
		},
	});
	let previousContents = quill.getContents();

	quill.on("selection-change", function (range) {
		if (range) {
			savedSelection = range;
		}
	});

	//set js code to quill

	//properly escape html tags
	quill.on("text-change", function () {
		html = quill.getSemanticHTML();
		html = html
			.replace(/<p><\/p>/g, "<br>")
			.replace(/</g, "&lt;")
			.replace(/>/g, "&gt;");
		console.log(html);

		let delta = quill.getContents();
		delta = JSON.stringify(delta);

		let currentContents = quill.getContents();
		let previousImages = getImagesFromContents(previousContents);
		let currentImages = getImagesFromContents(currentContents);

		previousImages.forEach(function (image) {
			if (currentImages.indexOf(image) === -1) {
				// Handle image removal
				let formData = new FormData();
				formData.append("image", image);
				formData.append("action", "delete");

				fetch("/A.D-Blogs/handle-image", {
					method: "POST",
					body: formData,
				})
					.then((response) => response.text())
					.then((data) => console.log(data));
			}
		});

		previousContents = currentContents;
	});
	function getImagesFromContents(contents) {
		let images = [];
		contents.ops.forEach(function (op) {
			if (typeof op.insert === "object" && op.insert.hasOwnProperty("image")) {
				images.push(op.insert.image);
			}
		});
		return images;
	}

	//upload image
	let uploadBtn = document.querySelector("#uploadCover");
	let removeBtn = document.querySelector("#removeCover");
	let preview = document.querySelector(".cover-img");
	let fileInput = document.querySelector("#coverImgUpload");
	let coverBtnContainer = document.querySelector(".cover-upload-btn");
	let coverDetails = document.querySelector(".cover-details");

	function loadingBtn(status, btn, textAfterLoading) {
		if (status) {
			btn.innerHTML = "<i class='fa-solid fa-spinner-third fa-spin'></i>";
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
		uploadBtn.innerHTML = "<i class='fa-regular fa-image'></i> Add Cover";
		removeBtn.style.display = "none";
		fileInput.value = "";
		coverBtnContainer.classList.remove("cover-img-show-btns");
		coverDetails.style.display = "flex";
	}

	//post the blog as draft or published

	let publishBtn = document.querySelector("#publishPost");
	let draftBtn = document.querySelector("#saveDraft");
	let title = document.querySelector("#postTitle");

	title.addEventListener("paste", (e) => {
		e.preventDefault();
		let text = e.clipboardData.getData("text/plain");
		e.clipboardData.clearData();
		e.clipboardData.setData("text/plain", text);
		let selection = window.getSelection();
		if (!selection.rangeCount) return false;
		selection.deleteFromDocument();
		selection.getRangeAt(0).insertNode(document.createTextNode(text));
	});
	function postBlog(status) {
		let titleText = title.innerHTML;
		let category = document.querySelector("#postCategory").value;
		let content = html;
		let quillDelta = quill.getContents();
		quillDelta = JSON.stringify(quillDelta);
		let cover = fileInput.files[0];
		let formData = new FormData();
		formData.append("title", titleText);
		formData.append("content", content);
		formData.append("cover", cover);
		formData.append("status", status);
		formData.append("quillDelta", quillDelta);
		formData.append("category", category);

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
				if (status == 0) {
					loadingBtn(false, draftBtn, "Save Draft");
				} else {
					loadingBtn(false, publishBtn, "Publish");
				}
			});
	}
	publishBtn.addEventListener("click", () => {
		loadingBtn(true, publishBtn, "Publish");
		postBlog(1);
	});

	draftBtn.addEventListener("click", () => {
		loadingBtn(true, draftBtn, "Save Draft");
		postBlog(0);
	});

	let customOptions = document.querySelector(".custom-options");
	let postCategory = document.querySelector("#postCategory");
	let categoryList = document.querySelectorAll(".custom-options li");

	postCategory.addEventListener("input", () => {
		console.log(postCategory.value);
		fetch("/A.D-Blogs/get-category", {
			method: "POST",
			body: JSON.stringify({ category: postCategory.value }),
		})
			.then((response) => response.json())
			.then((data) => {
				// Clear the current options
				customOptions.innerHTML = "";

				// Add each category as a new li element
				data.forEach((category) => {
					let li = document.createElement("li");
					li.textContent = category.category;
					customOptions.appendChild(li);

					// Add click event listener to the new li element
					li.addEventListener("click", () => {
						console.log(li.textContent);
						postCategory.value = li.textContent;
						customOptions.classList.remove("show-options");
					});
				});
			});

		if (postCategory.value == "") {
			customOptions.classList.remove("show-options");
		} else {
			customOptions.classList.add("show-options");
		}
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
