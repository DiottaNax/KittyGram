document.addEventListener("DOMContentLoaded", () => {
  // Show the modal event listener
  document
    .getElementById("comment-modal")
    .addEventListener("show.bs.modal", function (event) {
      const button = event.relatedTarget; // Button that triggered the modal
      const post_id = button.getAttribute("data-post-id"); // Extract post id from the button
      const post_owner = button.getAttribute("data-post-owner"); // Extract post owner's id from the button
      const commentArea = document.getElementById("commentArea");
      commentArea.setAttribute("data-post-id", post_id);
      commentArea.setAttribute("data-post-owner", post_owner);
      console.log("Post id: " + post_id);
    });
});
