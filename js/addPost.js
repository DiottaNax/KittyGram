document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("addPostForm");
  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevenire il comportamento di invio standard del form

    const formData = new FormData(form);

    fetch("./api/new-post.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => { return response.json(); }) // Convertire la risposta in JSON
      .then((data) => {
        console.log(data);
        document.getElementById("uploadResult").innerText = data['message']; // Accedere direttamente a `data.message`
      })
      .catch((error) => console.error("Error:", error));
  });
});
