document.addEventListener("DOMContentLoaded", () => {
  const closeButton = document.getElementById("closeComment");
  const commentModal = document.getElementById("comment-modal");
  // Show the modal event listener
  commentModal
    .addEventListener("show.bs.modal", function (event) {
      const button = event.relatedTarget; // Button that triggered the modal
      const post_id = button.getAttribute("data-post-id"); // Extract post id from the button
      const post_owner = button.getAttribute("data-post-owner"); // Extract post owner's id from the button

      document.getElementById("input-post-id").value = post_id;
      document.getElementById("input-post-owner").value = post_owner;
      console.log("Post id: " + post_id);
    });

  // Ensure the textarea is focused when the modal is completely shown
  document
    .getElementById("comment-modal")
    .addEventListener("shown.bs.modal", function () {
      document.getElementById("commentArea").focus();
    });

  commentModal.addEventListener("hide.bs.modal", clearModal());

  // Aggiungi un listener per il bottone di chiusura personalizzato
  closeButton.addEventListener("click", function () {
    clearModal();
    location.reload();
  });

  function clearModal() {
    document.getElementById("commentArea").innerHTML = "";
  }
});
