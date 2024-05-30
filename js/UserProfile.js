document.addEventListener("DOMContentLoaded", function () {
  const userSettingsButton = document.getElementById("user-settings-button");

  if (userSettingsButton != null) {
    userSettingsButton.addEventListener("click", (event) => {
      window.location.href = "userSettings.php";
    });
  }
});
