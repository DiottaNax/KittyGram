document.addEventListener("DOMContentLoaded", () => {
    const updateForm = document.getElementById("updateForm");
    const defaultPic = document.getElementById("previewImage").getAttribute("src");

  updateForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formToSend = new FormData(updateForm);

    fetch("./api/update-profile.php", {
      method: "POST",
      body: formToSend,
    }).then((response) => {
      if (response.redirected) {
        updateForm.reset();
        document.getElementById("update-result").innerText =
          "Profile has been correctly updated!";
        setTimeout(() => (window.location.href = response.url), 1000);
      } else {
        const data = response.json();
        console.log(data);
        updateForm.reset();
        document.getElementById("update-result").innerText = data["message"]; // Accedere direttamente a `data.message`
      }
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
      preview.src = defaultPic; // Default image if no file is selected
    }
  });
});
