document.addEventListener("DOMContentLoaded", function () {
  event.preventDefault();

  // Event listener for signup button
  document.getElementById("signupId").onclick = () => {
    window.location.href = "./signup.php";
  };

  // Send axios request to process_login.php
  document
    .getElementById("loginFormId")
    .addEventListener("submit", function () {
      event.preventDefault();
      var form = document.getElementById("loginFormId");
      var formData = new FormData(form);

      formData.append("username", document.getElementById("usernameId").value);
      formData.append("password", document.getElementById("passwordId").value);

      axios.post("./api/process_login.php", formData).then((response) => {
          console.log(response.data);
          document.getElementById("resultId").innerText= response.data["message"];
        if (response.data["success"]) {
          setTimeout(() => (window.location.href = "index.php"), 500);
        }
      });
    });
});
