let articleButtons = document.querySelector(".article-buttons");
articleButtons.style.transform = "translateY(100px)";
let scrollIndicator = document.querySelector(".scroll-indicator");

window.addEventListener("scroll", function () {
	if (window.scrollY > 100) {
		articleButtons.style.position = "sticky";
		articleButtons.style.transform = "translateY(0)";

		scrollIndicator.style.opacity = "1";
		scrollIndicator.style.width =
			(window.scrollY /
				(window.document.body.scrollHeight - window.innerHeight)) *
				100 +
			"%";
	} else {
		articleButtons.style.transform = "translateY(100px)";
		scrollIndicator.style.opacity = "0";
	}
});

let likeBtn = document.querySelectorAll(".like-btn");
likeBtn.forEach(function (button) {
	button.addEventListener("click", () => {
		button.disabled = true;
		let post = button.getAttribute("data-post");
		let action = button.classList.contains("not-liked") ? "like" : "unlike";

		fetch(baseUrl + "post-like-config", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: `post=${post}&action=${action}`,
		})
			.then((response) => {
				return response.text();
			})
			.then((data) => {
				console.log(data);
				if (data === "success") {
					if (action === "like") {
						button.disabled = false;
						button.innerHTML =
							"<i class='fa-solid fa-heart' style='color: #BA0021'></i>";
						button.classList.add("liked");
						button.classList.remove("not-liked");
					} else if (action === "unlike") {
						button.disabled = false;
						button.innerHTML = "<i class='fa-light fa-heart'></i>";
						button.classList.remove("liked");
						button.classList.add("not-liked");
					}
				} else if (data === "login") {
					showAlert("warning", "Please login to like this post");
					button.disabled = false;
					button.innerHTML = "<i class='fa-light fa-heart'></i>";
				} else {
					showAlert("warning", "Something went wrong.");
					button.disabled = false;
					button.innerHTML = "<i class='fa-light fa-heart'></i>";
				}
			});
	});
});

let bookmarkBtn = document.querySelectorAll(".bookmark-btn");
bookmarkBtn.forEach(function (button) {
	button.addEventListener("click", () => {
		button.disabled = true;
		let post = button.getAttribute("data-post");
		let action = button.classList.contains("not-bookmarked")
			? "bookmark"
			: "unbookmark";

		fetch(baseUrl + "bookmark-config", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body: `post=${post}&action=${action}`,
		})
			.then((response) => {
				return response.text();
			})
			.then((data) => {
				console.log(data);
				if (data === "success") {
					if (action === "bookmark") {
						button.disabled = false;
						button.innerHTML =
							"<i class='fa-solid fa-bookmark' style='color: #d5ac4e'></i>";
						button.classList.add("bookmarked");
						button.classList.remove("not-bookmarked");
						showAlert("success", "Post added to bookmarks");
					} else if (action === "unbookmark") {
						button.disabled = false;
						button.innerHTML = "<i class='fa-light fa-bookmark'></i>";
						button.classList.remove("bookmarked");
						button.classList.add("not-bookmarked");
						showAlert("success", "Post removed from bookmarks");
					}
				} else if (data === "login") {
					showAlert("warning", "Please login to save this post");
					button.disabled = false;
					button.innerHTML = "<i class='fa-light fa-bookmark'></i>";
				} else {
					showAlert("warning", "Something went wrong.");
					button.disabled = false;
					button.innerHTML = "<i class='fa-light fa-bookmark'></i>";
				}
			});
	});
});

//add button to code blocks
let codeBlock = document.querySelectorAll("pre");
codeBlock.forEach((block) => {
	hljs.highlightElement(block);
	hljs.configure({
		ignoreUnescapedHTML: true,
	});

	let button = document.createElement("button");
	button.innerHTML = "<i class='fa-regular fa-copy'></i>";
	button.classList.add("copy-btn");
	block.appendChild(button);
});

//copy code to clipboard
let copyBtn = document.querySelectorAll(".copy-btn");
copyBtn.forEach((button) => {
	button.addEventListener("click", () => {
		button.disabled = true;
		button.innerHTML = "<i class='fa-solid fa-loader fa-spin'></i>";
		let code = button.parentElement.textContent;
		setTimeout(() => {
			navigator.clipboard.writeText(code).then(
				function () {
					showAlert("success", "Code copied to clipboard");
					button.disabled = false;
					button.innerHTML = "<i class='fa-regular fa-check'></i>";
				},
				function () {
					showAlert("warning", "Failed to copy code");
					button.disabled = false;
					button.innerHTML = "<i class='fa-regular fa-copy'></i>";
				}
			);
		}, 500);
		setTimeout(() => {
			button.innerHTML = "<i class='fa-regular fa-copy'></i>";
		}, 2000);
	});
});
