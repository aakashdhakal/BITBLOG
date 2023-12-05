let formTab = document.querySelectorAll(".form-step span");
let nextBtn = document.querySelectorAll(".next-btn");
let prevBtn = document.querySelectorAll(".prev-btn");
let activeForm = document.querySelectorAll(".form-group");
let progress = document.querySelector(".form-step");
let loginLink = document.querySelector("#loginLink");

loginLink.addEventListener("click", function () {
	dialogClose(signupDialog);
	setTimeout(function () {
		dialogOpen(loginDialog);
	}, 300);
});

currentFormTab = 0;
width = 0;
formTab[currentFormTab].classList.add("active-form-tab");
activeForm[currentFormTab].classList.add("active-form");
previousCheck();

function previousCheck() {
	if (currentFormTab == 0) {
		prevBtn.forEach((btn) => {
			btn.style.visibility = "hidden";
		});
	} else {
		prevBtn.forEach((btn) => {
			btn.style.visibility = "visible";
		});
	}
}

nextBtn.forEach((btn) => {
	btn.addEventListener("click", async function () {
		btn.disabled = true;
		btn.innerHTML = '<i class="fa-duotone fa-spinner-third fa-spin"></i>';
		hideDialogAlert();
		if (!(await checkValidation(currentFormTab))) {
			btn.disabled = false;
			btn.innerHTML = "Next";
			return;
		} else {
			btn.disabled = false;
			btn.innerHTML = "Next";
			formTab[currentFormTab].innerHTML = '<i class="fa-duotone fa-check"></i>';
			width += 32;
			progress.style.setProperty("--before-width", width + "%");
			activeForm[currentFormTab++].classList.remove("active-form");
			previousCheck();
			formTab[currentFormTab].classList.add("active-form-tab");
			activeForm[currentFormTab].classList.add("active-form");
		}
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

//Preview Image

let imagePreview = document.querySelector("#profilepicPreview");
let imageUpload = document.querySelector("#signupProfilepic");

imageUpload.addEventListener("change", function () {
	imagePreview.src = URL.createObjectURL(this.files[0]);
});

function checkFile(file) {
	if (file.files.length == 0) {
		return true;
	} else if (
		file.files[0].type != "image/jpeg" &&
		file.files[0].type != "image/png" &&
		file.files[0].type != "image/jpg"
	) {
		showDialogAlert("File type must be jpeg, jpg or png");
		return false;
	} else if (file.files[0].size > 1024 * 1024 * 2) {
		showDialogAlert("File size must be less than 2MB");
		return false;
	} else {
		return true;
	}
}

//validaion for signup form

let signupFirstname = document.querySelector("#signupFirstname");
let signupLastname = document.querySelector("#signupLastname");
let signupEmail = document.querySelector("#signupEmail");
let signupPassword = document.querySelector("#signupPassword");
let signupConfirmPassword = document.querySelector("#signupConfirmPassword");
let signupUsername = document.querySelector("#signupUsername");
let signupRole = document.querySelector("#signupRole");
let signupSubmit = document.querySelector("#signupSubmit");
let sendOtp = document.querySelector("#sendOtp");
let otpEmail = document.querySelector("#otpEmail");
let signupForm = document.querySelector(".signupForm");
let validCheck = document.querySelector(".valid-check");
var otpCode;

sendOtp.addEventListener("click", function () {
	OtpSend();
});

function checkEmpty(inputField) {
	if (inputField.value == "") {
		showDialogAlert("Please fill out all the fields");
		return false;
	} else {
		return true;
	}
}

async function checkDuplicate(data, isUsername) {
	const endPoint = "signup-validate-config";

	return fetch(endPoint, {
		method: "POST",
		headers: {
			"Content-Type": "application/x-www-form-urlencoded",
		},
		body: isUsername ? "username=" + data : "email=" + data,
	})
		.then((response) => {
			return response.text().then((data) => {
				if (data == "taken") {
					return true;
				} else {
					return false;
				}
			});
		})
		.catch(() => {
			showDialogAlert("Something went wrong! Please try again later");
			return true; // Assuming an error should be treated as "taken"
		});
}

async function validateEmail(email) {
	if (!checkEmpty(email)) {
		return false;
	} else if (
		!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value)
	) {
		showDialogAlert("Please enter a valid email address");
		return false;
	} else {
		try {
			const isTaken = await checkDuplicate(email.value, false);
			if (isTaken) {
				showDialogAlert("The email address is already registered");
				return false;
			} else {
				return true;
			}
		} catch (error) {
			showDialogAlert("Something went wrong! Please try again later");
			return true; // Assuming an error should be treated as "taken"
		}
	}
}

async function validateUsername(username) {
	if (!checkEmpty(username)) {
		return false;
	} else if (/^[a-zA-Z0-9_]+$/.test(username.value) == false) {
		showDialogAlert(
			"Username can only contain letters, numbers and underscores"
		);
		return false;
	} else if (username.value.length < 5) {
		showDialogAlert("Username must be atleast 5 characters long");
		return false;
	} else if (username.value.length > 20) {
		showDialogAlert("Username must be less than 20 characters long");
		return false;
	} else {
		try {
			const isTaken = await checkDuplicate(username.value, true);
			if (isTaken) {
				showDialogAlert("The username is not available");
				return false;
			} else {
				return true;
			}
		} catch (error) {
			showDialogAlert("Something went wrong! Please try again later");
			return true; // Assuming an error should be treated as "taken"
		}
	}
}

function validatePassword(password) {
	if (!checkEmpty(password)) {
		return false;
	} else if (password.value.length < 8) {
		showDialogAlert("Password must be at least 8 characters long");
		return false;
	} else if (password.value.length > 20) {
		showDialogAlert("Password must be less than 20 characters long");
		return false;
	} else if (!password.value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/)) {
		showDialogAlert(
			"Password must contain at least one uppercase, lowercase, and a number"
		);
		return false;
	} else if (password.value !== signupConfirmPassword.value) {
		showDialogAlert("Passwords do not match");
		return false;
	} else {
		return true;
	}
}
function OtpSend() {
	otpCode = Math.floor(100000 + Math.random() * 900000);
	const endPoint = "otp-config";
	sendOtp.disabled = true;
	sendOtp.innerHTML = '<i class="fa-duotone fa-spinner-third fa-spin"></i>';

	return fetch(endPoint, {
		method: "POST",
		headers: {
			"Content-Type": "application/x-www-form-urlencoded",
		},
		body:
			"otpCode=" +
			otpCode +
			"&email=" +
			signupEmail.value +
			"&username=" +
			signupUsername.value,
	})
		.then((response) => {
			return response.text().then((data) => {
				if (data == "success") {
					showDialogAlert("OTP sent to your email address");
					var timer = 60;
					var interval = setInterval(function () {
						timer--;
						sendOtp.innerHTML = "Resend in " + timer;
						if (timer == 0) {
							clearInterval(interval);
							sendOtp.disabled = false;
							sendOtp.innerHTML = "Resend Code";
						}
					}, 1000);
				} else {
					console.log(data);
					showDialogAlert(
						"Something went wrong! Please try again later " + data
					);
					sendOtp.disabled = false;
					sendOtp.innerHTML = "Send Code";
				}
			});
		})
		.catch(() => {
			showDialogAlert("Something went wrong! Please try again later");
			sendOtp.disabled = false;
			sendOtp.innerHTML = "Send Code";
		});
}

function validateOtp() {
	if (!checkEmpty(otpEmail)) {
		return false;
	} else {
		if (otpEmail.value == otpCode) {
			return true;
		} else {
			showDialogAlert("Incorrect OTP");
			return false;
		}
	}
}

async function checkValidation(index) {
	var canProceed = false;
	switch (index) {
		case 0:
			if (!checkEmpty(signupFirstname)) {
				break;
			} else if (!checkEmpty(signupLastname)) {
				break;
			} else if (!(await validateEmail(signupEmail))) {
				// Await the result
				break;
			} else {
				canProceed = true;
				break;
			}
		case 1:
			if (!(await validateUsername(signupUsername))) {
				break;
			} else if (!validatePassword(signupPassword)) {
				break;
			} else {
				canProceed = true;
				break;
			}
		case 2:
			if (!checkFile(imageUpload)) {
				break;
			} else {
				OtpSend();
				canProceed = true;
				break;
			}
	}
	return canProceed;
}

signupForm.addEventListener("submit", function (e) {
	e.preventDefault();

	signupSubmit.disabled = true;
	signupSubmit.innerHTML =
		'<i class="fa-duotone fa-spinner-third fa-spin"></i>';
	if (!validateOtp()) {
		signupSubmit.disabled = false;
		signupSubmit.innerHTML = "Sign up";
		return;
	} else {
		let formdata = new FormData(signupForm);
		formdata.append("profilepic", imageUpload.files[0]);
		fetch("signup-config", {
			method: "POST",
			body: formdata,
		})
			.then(async (response) => {
				return response.text().then((data) => {
					if (data == "success") {
						showDialogAlert("Account created successfully");
						setTimeout(function () {
							loginUsername.value = signupUsername.value;
							loginPassword.value = signupPassword.value;
							loginSubmit.click();
						}, 2000);
					} else {
						console.log(data);
						showDialogAlert(
							"Something went wrong! Please try again later" + data
						);
						signupSubmit.disabled = false;
						signupSubmit.innerHTML = "Sign up";
					}
				});
			})
			.catch(() => {
				showDialogAlert("Something went wrong! Please try again later");
				signupSubmit.disabled = false;
				signupSubmit.innerHTML = "Sign up";
			});
	}
});
