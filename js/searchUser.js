function searchUser() {
  // Ottenere il valore della ricerca
  var searchTerm = document.getElementById("searchInputId").value;

  // Effettuare una richiesta GET utilizzando Axios
  axios
    .get("./api/search-user.php?searchTerm=" + searchTerm)
    .then((response) => {
      // Aggiornare il corpo del modal con i risultati della ricerca
      document.getElementById("searchModalBodyId").innerHTML = response.data;
    })
    .catch((error) => {
      console.error("Errore durante la richiesta:", error);
    });
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("searchButtonId")
        .addEventListener("click", searchUser);
    document
      .getElementById("searchInputId")
      .addEventListener("keypress", function (event) {
        // Verificare se il tasto premuto è "Invio" (codice 13)
        if (event.key == "Enter") {
          // Eseguire la ricerca
          searchUser();
        }
      });
});
