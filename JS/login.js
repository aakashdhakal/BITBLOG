let loginBtn = document.querySelector("#loginBtn");
let loginDialog = document.querySelector("#loginForm");
let signupDialog = document.querySelector("#signupForm");
let signupBtn = document.querySelector("#signupBtn");
let closeBtn = document.querySelectorAll("#closeBtn");

loginBtn.addEventListener("click", function () {
	dialogOpen(loginDialog);
});

signupBtn.addEventListener("click", function () {
	dialogOpen(signupDialog);
});

closeBtn.forEach((btn) => {
	btn.addEventListener("click", function () {
		if (loginDialog.open) {
			dialogClose(loginDialog);
		} else if (signupDialog.open) {
			dialogClose(signupDialog);
		}
	});
});

document.addEventListener("click", function (event) {
	if (event.target == loginDialog) {
		dialogClose(loginDialog);
	} else if (event.target == signupDialog) {
		dialogClose(signupDialog);
	}
});

function dialogOpen(dialogElement) {
	dialogElement.style.animation = "dialogShow 0.3s ease";
	dialogElement.showModal();
}

function dialogClose(dialogElement) {
	hideDialogAlert();
	dialogElement.style.animation = "dialogClose 0.3s ease";
	setTimeout(function () {
		dialogElement.close();
	}, 300);
}

let loginSubmit = document.querySelector("#loginSubmit");
let loginPassword = document.querySelector("#loginPassword");
let loginUsername = document.querySelector("#loginUsername");
let loginForm = document.querySelector(".loginForm");

loginForm.addEventListener("submit", function (e) {
	e.preventDefault();
	hideDialogAlert();
	loginSubmit.disabled = true;
	loginSubmit.innerHTML = '<i class="fa-duotone fa-spinner-third fa-spin"></i>';
	if (loginUsername.value === "" || loginPassword.value === "") {
		showDialogAlert("Please fill all the fields");
		loginSubmit.disabled = false;
		loginSubmit.innerHTML = "Log in";
		return;
	} else {

		fetch("login-config", {
			method: "POST",
			headers: {
				"Content-Type": "application/x-www-form-urlencoded",
			},
			body:
				"username=" +
				encodeURIComponent(loginUsername.value) +
				"&password=" +
				encodeURIComponent(loginPassword.value),
		})
			.then((response) => response.text())
			.then((data) => {
				if (data === "success") {
					location.reload();
				} else if (data === "wrong") {
					showDialogAlert("Incorrect Username or Password");
					loginSubmit.disabled = false;
					loginSubmit.innerHTML = "Log in";
					return;
				} else {
					showDialogAlert("Something went wrong ! Please try again later");
					loginSubmit.disabled = false;
					loginSubmit.innerHTML = "Log in";
					return;
				}
			});
	}
});

let passwordToggle = document.querySelectorAll(".password-show");

passwordToggle.forEach((toggle) => {
	let passwordInput = toggle.parentElement.children[0];
	toggle.addEventListener("click", function () {
		if (passwordInput.type == "password") {
			passwordInput.type = "text";
			toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
		} else {
			passwordInput.type = "password";
			toggle.innerHTML = '<i class="fas fa-eye" ></i>';
		}
	});
});

//dialog alert

let dialogAlert = document.querySelectorAll(".alert-box-dialog");

function showDialogAlert(message) {
	dialogAlert.forEach((alert) => {
		alertMessage = alert.children[1];
		alertMessage.innerHTML = message;
		alert.style.visibility = "visible";
		alert.style.opacity = "1";
	});
}

function hideDialogAlert() {
	dialogAlert.forEach((alert) => {
		alert.style.visibility = "hidden";
		alert.style.opacity = "0";
	});
}

let signupLink = document.getElementById("signupLink");

signupLink.addEventListener("click", function () {
	dialogClose(loginDialog);
	setTimeout(function () {
		dialogOpen(signupDialog);
	}, 300);
});
