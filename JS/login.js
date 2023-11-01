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
	if (loginUsername.value === "" || loginPassword.value === "") {
		showAlert("error", "Please fill out all fields.");
		return;
	} else {
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "login-config.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				if (xhr.responseText === "success") {
					location.reload();
				} else {
					showAlert("error", "Invalid username or password.");
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
