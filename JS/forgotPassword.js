let forgetPassLink = document.getElementById("forgetPass");
let forgetPassDialog = document.getElementById("forgotPassword");
let forgotEmail = document.getElementById("forgotEmail");
let verifyOtp = document.querySelector(".verify-otp");
let resetPassword = document.querySelector("#resetPassword");
let verifyEmail = document.querySelector(".verify-email");
let verifyOtpBtn = document.querySelector("#verifyOtp");
let otpCodeInput = document.getElementById("otpCode");
let confirmResetPassword = document.querySelector("#confirmResetPassword");
let newPassword = document.querySelector("#newPassword");
let confirmNewPassword = document.querySelector("#confirmNewPassword");
let backToLoginBtn = document.querySelector(".back-to-login-btn");

forgetPassLink.addEventListener("click", function () {
	loginDialog.close();
	dialogOpen(forgetPassDialog);
});

sendOtp[1].addEventListener("click", async function () {
	if (forgotEmail.value === "") {
		showDialogAlert("Please fill all the fields");
		return false;
	} else if (!(await checkDuplicate(forgotEmail.value, 0))) {
		showDialogAlert("The email is not registered with us");
		return false;
	} else {
		await OtpSend(forgotEmail, 1);
		return true;
	}
});

let nextStep = document.querySelector(".next-step");

nextStep.addEventListener("click", async function () {
	// Add spinner
	nextStep.disabled = true;
	nextStep.innerHTML = '<i class="fa-duotone fa-spinner-third fa-spin"></i>';
	console.log("clicked");

	if (forgotEmail.value === "") {
		showDialogAlert("Please fill all the fields");
	} else if (!(await checkDuplicate(forgotEmail.value, 0))) {
		showDialogAlert("The email is not registered with us");
	} else {
		if (await OtpSend(forgotEmail, 1)) {
			verifyEmail.classList.remove("show-div");
			verifyOtp.classList.add("show-div");
			hideDialogAlert();
		}
	}
	nextStep.disabled = false;
	nextStep.innerHTML = "Send Code";
});

verifyOtpBtn.addEventListener("click", function () {
	verifyOtpBtn.disabled = true;
	verifyOtpBtn.innerHTML =
		'<i class="fa-duotone fa-spinner-third fa-spin"></i>';
	if (!checkEmpty(otpCodeInput)) {
		showDialogAlert("Please fill all the fields");
		verifyOtpBtn.disabled = false;
		verifyOtpBtn.innerHTML = "Verify OTP";
	} else {
		if (otpCodeInput.value == otpCode) {
			verifyOtp.classList.remove("show-div");
			resetPassword.classList.add("show-div");
			hideDialogAlert();
		} else {
			showDialogAlert("Incorrect OTP");
			verifyOtpBtn.disabled = false;
			verifyOtpBtn.innerHTML = "Verify OTP";
		}
	}
});

resetPassword.addEventListener("submit", function (e) {
	e.preventDefault();
	confirmResetPassword.disabled = true;
	confirmResetPassword.innerHTML =
		'<i class="fa-duotone fa-spinner-third fa-spin"></i>';
	if (validatePassword(newPassword, confirmNewPassword)) {
		fetch("/A.D-Blogs/reset-password", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body:
				"email=" +
				encodeURIComponent(forgotEmail.value) +
				"&password=" +
				encodeURIComponent(newPassword.value),
		})
			.then((response) => response.text())
			.then((data) => {
				if (data === "success") {
					showDialogAlert("Password reset successfully ! Please login again");
					setTimeout(() => {
						dialogClose(forgetPassDialog);
						dialogOpen(loginDialog);
						newPassword.value = "";
						confirmNewPassword.value = "";
						resetPassword.classList.remove("show-div");
						verifyEmail.classList.add("show-div");
					}, 1000);
				} else {
					showDialogAlert("Something went wrong ! Please try again later");
					confirmResetPassword.disabled = false;
					confirmResetPassword.innerHTML = "Reset Password";
					return;
				}
			});
	} else {
		confirmResetPassword.disabled = false;
		confirmResetPassword.innerHTML = "Reset Password";
	}
});

backToLoginBtn.addEventListener("click", function () {
	dialogClose(forgetPassDialog);
	dialogOpen(loginDialog);
	newPassword.value = "";
	confirmNewPassword.value = "";
	resetPassword.classList.remove("show-div");
	verifyEmail.classList.add("show-div");
});
