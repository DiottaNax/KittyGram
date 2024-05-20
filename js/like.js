let like = document.querySelectorAll(".like.btn");

like.forEach((button) =>
  button.addEventListener("click", function () {
    const post_id = button.getAttribute("data-post-id");
    const toRemove = button.classList.contains("liked");

    processLike(button, toRemove, post_id);
  })
);

function processLike(button, toRemove, post_id) {
  const likeRequest = new FormData();
  // add fields for post request
  likeRequest.append("post_id", post_id);
  likeRequest.append("remove_like", toRemove ? "true" : "false"); // boolean seemed not to work on axios requests

  axios.post("./api/process-like.php", likeRequest).then((response) => {
    let success = response.data["success"];

    if (success) {
      const removed = response.data["removed"];

      if (!removed) {
        // user put like

        // add liked class to like button
        button.classList.add("liked");

        // fill fields for a notification post request
        let notificationForm = new FormData();
        notificationForm.append("sender_id", response.data["sender_id"]);
        notificationForm.append("receiver_id", response.data["receiver_id"]);
        notificationForm.append("post_id", post_id);
        notificationForm.append("message", "really liked your post!");

        axios
          .post("./api/send-notification.php", notificationForm)
          .then((response) => { console.log("notification response:"); console.log(response.data); });
      } else {
        // user deleted like

        //remove class liked from like button
        button.classList.remove("liked");
      }

      // update svg rendering
      const svgPath = removed
        ? "m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"
        : "M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314";
      button.querySelector("svg path").setAttribute("d", svgPath);
    }
  });
}
