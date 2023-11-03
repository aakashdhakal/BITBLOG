let formTab = document.querySelectorAll(".form-step span");
let nextBtn = document.querySelectorAll(".next-btn");
let prevBtn = document.querySelectorAll(".prev-btn");
let activeForm = document.querySelectorAll(".form-group");
let progress = document.querySelector(".form-step");

currentFormTab = 0;
width = 0;
formTab[currentFormTab].classList.add("active-form-tab");
activeForm[currentFormTab].classList.add("active-form");
previousCheck();

function previousCheck() {
	if (currentFormTab == 0) {
		prevBtn.forEach((btn) => {
			btn.style.display = "none";
		});
	} else {
		prevBtn.forEach((btn) => {
			btn.style.display = "block";
		});
	}
}

nextBtn.forEach((btn) => {
	btn.addEventListener("click", function () {
		formTab[currentFormTab].innerHTML = '<i class="fa-duotone fa-check"></i>';
		width += 32;
		progress.style.setProperty("--before-width", width + "%");
		activeForm[currentFormTab++].classList.remove("active-form");
		previousCheck();
		formTab[currentFormTab].classList.add("active-form-tab");
		activeForm[currentFormTab].classList.add("active-form");
	});
});

prevBtn.forEach((btn) => {
	btn.addEventListener("click", function () {
		prevBtn.disabled = true;
		formTab[currentFormTab].innerHTML = currentFormTab + 1;
		width -= 32;
		progress.style.setProperty("--before-width", width + "%");
		formTab[currentFormTab].classList.remove("active-form-tab");
		activeForm[currentFormTab--].classList.remove("active-form");
		previousCheck();
		formTab[currentFormTab].classList.add("active-form-tab");
		activeForm[currentFormTab].classList.add("active-form");
		formTab[currentFormTab].innerHTML = currentFormTab + 1;
	});
});
