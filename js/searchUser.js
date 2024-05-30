document.addEventListener("DOMContentLoaded", function () {

  const searchInput = document.getElementById("searchInput");
  const searchBody = document.getElementById("searchModalBody");
  document
    .getElementById("searchInput")
    .addEventListener("input", function (event) {
      const searchTerm = searchInput.value;
      axios
        .get("./api/search-user.php?searchTerm=" + searchTerm)
        .then((response) => {
          // Aggiornare il corpo del modal con i risultati della ricerca
          searchBody.innerHTML = response.data;
        })
        .catch((error) => {
          console.error("Errore durante la richiesta:", error);
        });
    });

  searchInput.addEventListener("show.bs.modal", function (e) {
    // Reimposta il valore dell'input a una stringa vuota
    searchInput.innerHTML = "";
    searchBody.innerHTML = "<p></p>";
  });
});
