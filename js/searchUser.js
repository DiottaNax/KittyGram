document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const searchBody = document.getElementById("searchModalBody");
  const closeButton = document.getElementById("searchClose");

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

  searchInput.addEventListener("hide.bs.modal", clearModal());

  // Aggiungi un listener per il bottone di chiusura personalizzato
  closeButton.addEventListener("click", function () {
    clearModal();
    location.reload();
  });

  function clearModal() {
    searchInput.innerHTML = "";
    searchBody.innerHTML = "<p></p>";
  }
});
