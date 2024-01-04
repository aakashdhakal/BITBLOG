//category filter function

let categoryContainer = document.querySelector(".category-list");
let categoryList = categoryContainer.querySelectorAll("button");
let postContainer = document.querySelector("#postsAuthors  .posts");

categoryList[0].classList.add("primary-btn");

categoryList.forEach(function (button) {
	button.addEventListener("click", function () {
		postContainer.style.opacity = "0.5";
		postContainer.style.pointerEvents = "none";
		// Remove the "active-category" class from all category buttons
		categoryList.forEach(function (btn) {
			btn.classList.remove("primary-btn");
			btn.classList.add("secondary-btn");
		});
		// Add the "active-category" class to the clicked button
		this.classList.add("primary-btn");
		this.classList.remove("secondary-btn");

		// Filter the posts according to the clicked category
		let category = this.getAttribute("data-category");
		if (category != "") {
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "post-list-config", true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {
					postContainer.style.opacity = "1";
					postContainer.style.pointerEvents = "auto";
					postContainer.innerHTML = xhr.responseText;
				}
			};
			xhr.send("category=" + category);
		}
	});
});

//custom select script

// Get all custom select menus on the page
let customSelects = document.querySelectorAll(".custom-select");

// Loop through each select element
customSelects.forEach((select) => {
	let customOptions = select.querySelectorAll(".custom-options li");
	let selectInput = select.querySelector(".custom-select-display");
	let customOptionsContainer = select.querySelector(".custom-options");

	selectInput.addEventListener("click", function () {
		// Toggle the .active class on the container
		customOptionsContainer.classList.toggle("show-options");
	});

	document.addEventListener("click", function (event) {
		if (
			event.target.closest(".custom-select") === select ||
			event.target === selectInput
		)
			return;
		customOptionsContainer.classList.remove("show-options");
	});

	customOptions.forEach((option) => {
		option.addEventListener("click", function () {
			// Remove "active-option" class from all options
			customOptions.forEach((otherOption) => {
				otherOption.classList.remove("active-option");
			});

			// Add "active-option" class to the clicked option
			option.classList.add("active-option");
			customOptionsContainer.classList.remove("show-options");
			selectInput.value = option.innerText;
			selectInput.focus();
		});
	});
});

//file upload custom script

let fileInput = document.getElementById("signupProfilepic");
let fileSelect = document.getElementsByClassName("file-upload-select")[0];
fileSelect.addEventListener("click", function (e) {
	fileInput.click();
});

fileInput.addEventListener("change", function () {
	let filename = fileInput.files[0].name;
	let selectName = document.getElementsByClassName("file-select-name")[0];
	selectName.innerText = filename;
});
