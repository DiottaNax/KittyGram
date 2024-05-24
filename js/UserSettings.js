document.addEventListener("DOMContentLoaded", () => {
  document
    .getElementById("updateForm")
      .addEventListener("submit", function (event) {
      event.preventDefault();
      const form = new FormData();
          form.append("old_password", "aavmfmf7");
          form.append("new_password", "aavmfmf77");
      axios.post("api/update-profile.php", form).then((response) => {
        console.log(response.data);
      });
    });
});

function previewFile() {
  const preview = document.getElementById("previewImage");
  const file = document.getElementById("formFile").files[0]; // Utilizza l'ID corretto
  const reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = profilePictureUrl; // Default image if no file is selected
  }
}

function redirectToProfile(username) {
  window.location.href = "./open-profile.php?username=" + username;
}
