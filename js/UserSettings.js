document.addEventListener("DOMContentLoaded", () => {
  const updateForm = document.getElementById("updateForm");

  updateForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formToSend = new FormData(updateForm);

    fetch("./api/update-profile.php", {
      method: "POST",
      body: formToSend,
    })
      .then((response) => {
        console.log(response);
        return response.json(); // Convertire la risposta in JSON
      })
      .then((data) => {
          console.log(data);
          updateForm.reset();
        document.getElementById("update-result").innerText = data["message"]; // Accedere direttamente a `data.message`
      })
      .catch((error) => console.error("Error:", error));
  });
});

document.getElementById("new_pic").addEventListener("change", () => {
  const preview = document.getElementById("previewImage");
  const file = document.getElementById("new_pic").files[0]; // Utilizza l'ID corretto
  const reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = profilePictureUrl; // Default image if no file is selected
  }
});

function redirectToProfile(username) {
  window.location.href = "./open-profile.php?username=" + username;
}
