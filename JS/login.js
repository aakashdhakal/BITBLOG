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
		showDialogAlert("Do not leave any field empty");
		loginSubmit.disabled = false;
		loginSubmit.innerHTML = "Login";
		return;
	} else {
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "login-config.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (xhr.responseText === "success") {
					location.reload();
				} else if (xhr.responseText === "wrong") {
					showDialogAlert("Incorrect Username or Password");
					loginSubmit.disabled = false;
					loginSubmit.innerHTML = "Login";
					return;
				} else {
					showDialogAlert("Something went wrong ! Please try again later");
					loginSubmit.disabled = false;
					loginSubmit.innerHTML = "Login";
					return;
				}
			}
		};
		xhr.send(
			"username=" +
				encodeURIComponent(loginUsername.value) +
				"&password=" +
				encodeURIComponent(loginPassword.value)
		);
	}
});

let passwordToggle = document.querySelector("#passwordShow");

passwordToggle.addEventListener("click", function () {
	if (loginPassword.type === "password") {
		loginPassword.type = "text";
		passwordToggle.innerHTML =
			'<i class="fas fa-eye-slash" style="color:#6e6e6e"></i>';
	} else {
		loginPassword.type = "password";
		passwordToggle.innerHTML =
			'<i class="fas fa-eye" style="color:#6e6e6e"></i>';
	}
});

//dialog alert

let dialogAlert = document.querySelector(".alert-box-dialog");
let dialogAlertMessage = document.querySelector("#dialogAlertMessage");

function showDialogAlert(message) {
	dialogAlertMessage.innerHTML = message;
	dialogAlert.style.visibility = "visible";
	dialogAlert.style.opacity = "1";
}

function hideDialogAlert() {
	dialogAlert.style.visibility = "hidden";
	dialogAlert.style.opacity = "0";
}

let signupLink = document.getElementById("signupLink");

signupLink.addEventListener("click", function () {
	dialogClose(loginDialog);
	setTimeout(function () {
		dialogOpen(signupDialog);
	}, 300);
});
