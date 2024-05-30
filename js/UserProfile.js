document.addEventListener("DOMContentLoaded", function () {
  console.log("first enter");
  const taggedSwitch = document.getElementById("taggedSwitch");
  const userPostsContainer = document.getElementById("userPostsContainer");
  const adoptionsContainer = document.getElementById("adoptionsContainer");
  const userSettingsButton = document.getElementById("user-settings-button");

  taggedSwitch.addEventListener("change", function () {
    if (this.checked) {
      userPostsContainer.style.display = "none";
      adoptionsContainer.style.display = "block";
    }
  });

  if (userSettingsButton != null) {
    userSettingsButton.addEventListener("click", (event) => {
      window.location.href = "userSettings.php";
    });
  }
});
