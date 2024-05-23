document.addEventListener("DOMContentLoaded", () => {
  const commentForm = document.getElementById("commentForm");
  let post_id = 0;
  let post_owner = "";

  // Show the modal event listener
  document
    .getElementById("comment-modal")
    .addEventListener("show.bs.modal", function (event) {
      const button = event.relatedTarget; // Button that triggered the modal
      post_id = button.getAttribute("data-post-id"); // Extract post id from the button
      post_owner = button.getAttribute("data-post-owner"); // Extract post owner's id from the button
      console.log("Post id: " + post_id);
    });

  commentForm.addEventListener("submit", () => {
    event.preventDefault();
    const sendCommentForm = new FormData();
    sendCommentForm.append("post_id", post_id);
    const commentArea = document.getElementById("commentArea");
    const writer = commentArea.getAttribute("writer");
    sendCommentForm.append("writer", writer);
    sendCommentForm.append("comment", commentArea.value);
    sendCommentForm.append("post_owner", post_owner);
    
    axios.post("api/add-comment.php", sendCommentForm).then((response) => {
      console.log(response.data);
      console.log("writer: " + writer);
      if (response.data['success']) {
        document.getElementById("commentArea").innerText = "";

        // fill fields for a notification post request
        let notificationForm = new FormData();
        notificationForm.append("sender_username", writer);
        notificationForm.append("receiver_username", post_owner);
        notificationForm.append("post_id", post_id);
        const messageEnding = response.data["comment"].length > 60 ? "..." : "";
        const notificationMessage = response.data["comment"].substring(0, 60) + messageEnding;
        notificationForm.append("message", " commented your post: \"" + notificationMessage + "\"");

        axios
          .post("./api/send-notification.php", notificationForm)
          .then((response) => {
            console.log("notification response:");
            console.log(response.data);
        });
      }
    })
  });
});
