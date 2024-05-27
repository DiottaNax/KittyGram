function searchUser() {
  // Effettuare una richiesta GET utilizzando Axios
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
}

document.addEventListener("DOMContentLoaded", function () {
  
    document
      .getElementById("searchInput")
      .addEventListener("input", function (event) {
        searchUser();
      });
});
