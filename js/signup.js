document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("signupForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      var form = document.getElementById("signupForm");
      var formData = new FormData(form);

      formData.append("email", document.getElementById("emailId").value);
      formData.append("name", document.getElementById("nameId").value);
      formData.append("surname", document.getElementById("surnameId").value);
      formData.append("username", document.getElementById("usernameId").value);
      formData.append("password", document.getElementById("passwordId").value);
      formData.append(
        "confirmPassword",
        document.getElementById("confirmPasswordId").value
      );

      // Check if passwords match
      if (formData.get("password") != formData.get("confirmPassword")) {
        console.log("passwords do not match.");
        document.getElementById("resultId").innerText =
          "Passwords do not match!";
        document.getElementById("resultId").style.color = "red";
        return;
      }

      console.log(formData.values);

      axios.post("./api/register.php", formData).then((response) => {
        console.log(response.data);
        if (response.data["success"]) {
          document.getElementById("resultId").innerText =
            "Thank you for joining us! Redirecting to home page...";
          document.getElementById("resultId").style.color = "black";
          setTimeout(() => (window.location.href = "index.php"), 500);
        } else {
          document.getElementById("resultId").innerText =
            response.data["error"];
          document.getElementById("resultId").style.color = "red";
        }
      });
    });
})
