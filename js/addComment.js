function sendComment(post_id, writer_username, comment, post_owner) {

  const commentForm = new FormData();
  commentForm.append("post_id", post_id);
  commentForm.append("writer", writer_username);
  commentForm.append("comment", comment);
  commentForm.append("post_owner", post_owner);


  axios.post("api/add-comment.php", commentForm).then((response) => {
    console.log(response.data);
    console.log("writer: " + writer_username);
    if (response.data["success"]) {
      document.getElementById("commentArea").innerText = "";

      const messageEnding = response.data["comment"].length > 60 ? "..." : "";
      const notificationMessage =
        'Commented your post: "' +
        response.data["comment"].substring(0, 60) +
        messageEnding +
        '"';

      sendNotificationUsingUsernames(writer_username, post_owner, notificationMessage, post_id);
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const commentForm = document.getElementById("commentForm");

  commentForm.addEventListener("submit", () => {
    event.preventDefault();
    const commentArea = document.getElementById("commentArea");
    const post_id = commentArea.getAttribute("data-post-id"); // Extract post id from the commentArea
    const post_owner = commentArea.getAttribute("data-post-owner"); // Extract post owner's id from the commentArea
    const writer = commentArea.getAttribute("writer");
    sendComment(post_id, writer, commentArea.value, post_owner);
  });
});
