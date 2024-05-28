document.addEventListener("DOMContentLoaded", (event) => {
  const requestRemovers = document.querySelectorAll(".remove-request");
  requestRemovers.forEach((remover) => {
    remover.addEventListener("click", (event) => {
      event.preventDefault();
      const submitter = remover.getAttribute("data-submitter");
      const post_id = remover.getAttribute("data-post-id");
        console.log("submitter: " + submitter + ", post_id: " + post_id);
        
        const removeForm = new FormData();
        removeForm.append("adoption_id", post_id);
        removeForm.append("adoption_submitter", submitter);

        axios.post("api/delete-adoption-request.php", removeForm).then(response => {
            location.reload();
        });
    });
  });
});
