let loginBtn = document.querySelector("#loginBtn");
let loginDialog = document.querySelector("dialog");
let closeBtn = document.querySelector("#closeBtn");

loginBtn.addEventListener("click", function () {
	loginDialog.showModal();
});

closeBtn.addEventListener("click", function () {
	loginDialog.close();
});

let loginSubmit = document.querySelector("#loginSubmit");
let loginPassword = document.querySelector("#loginPassword");
let loginUsername = document.querySelector("#loginUsername");
let loginForm = document.querySelector(".loginForm");

loginForm.addEventListener("submit", function (e) {
	e.preventDefault();
	if (loginUsername.value === "" || loginPassword.value === "") {
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
					alert(xhr.responseText);
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
