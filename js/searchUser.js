document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("searchInput")
    .addEventListener("input", function (event) {
      const searchTerm = document.getElementById("searchInput").value;
      axios
        .get("./api/search-user.php?searchTerm=" + searchTerm)
        .then((response) => {
          // Aggiornare il corpo del modal con i risultati della ricerca
          document.getElementById("searchModalBody").innerHTML = response.data;
        })
        .catch((error) => {
          console.error("Errore durante la richiesta:", error);
        });
    });

  $("#searchModal").on("hidden.bs.modal", function (e) {
    // Reimposta il valore dell'input a una stringa vuota
    $("#searchInput").val("");
    $("#searchModalBody").innerHTML = "<p></p>";
  });
});
