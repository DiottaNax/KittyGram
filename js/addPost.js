document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("addPostForm");
  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevenire il comportamento di invio standard del form

    const formData = new FormData(form);

    fetch("./api/new-post.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (response.redirected) {
          document.getElementById("uploadResult").innerText =
            "Ready to show your kitty to the entire world 😸!";
          setTimeout(() => (window.location.href = response.url), 1000);
          return {
            message: "Ready to show your kitty to the entire world 😸!",
          };
        } else {
          return response.json();
        }
      }) // Convertire la risposta in JSON
      .then((data) => {
        document.getElementById("uploadResult").innerText = data["message"]; // Accedere direttamente a `data.message`
      })
      .catch((error) => console.error("Error:", error));
  });

  const adoptionCheckbox = document.getElementById("isAdoption");
  const cityInput = document.getElementById("city_name");
  const cityList = document.getElementById("city_list");

  adoptionCheckbox.addEventListener("change", function () {
    if (this.checked) {
      cityInput.removeAttribute("disabled");
    } else {
      cityInput.setAttribute("disabled", true);
      cityInput.value = ""; // Reset city input value
    }
  });

  cityInput.addEventListener("input", function (event) {
    const searchTerm = cityInput.value;
    axios
      .get("./api/search-city.php?searchTerm=" + searchTerm)
      .then((response) => {
        // Aggiornare il corpo del modal con i risultati della ricerca
        cityList.innerHTML = response.data;
      })
      .catch((error) => {
        console.error("Errore durante la richiesta:", error);
      });
  });
});
