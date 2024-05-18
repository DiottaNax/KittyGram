let like = document.querySelectorAll(".like.btn");

const callBackFunctionLike = () => {
  like.forEach((element) => {
    const idPost = element.getAttribute("data-postid");
    const formData = new FormData();
    formData.append("post_id", idPost);
    axios.post("./api/like-check.php", formData).then((response) => {
      console.log(response);
      if (response.data["isLiked"] == true) {
        if (!element.classList.contains("liked")) {
          element.classList.add("liked");
        }
      }
    });
  });
};

Array.from(like).forEach((button) =>
  button.addEventListener("click", function () {
    const idPost = button.getAttribute("data-postid");
    const formData = new FormData();
    formData.append("post_id", idPost);
    console.log(button.classList.contains("liked"));
    if (button.classList.contains("liked")) {
      button.classList.remove("liked");
      formData.append("remove", true);
      likes(formData, true);
    } else if (!button.classList.contains("liked")) {
      button.classList.add("liked");
      likes(formData, false);
      console.log("hai messo like");
    }
    const isLiked = button.classList.contains("liked");
    const svgPath = isLiked
      ? "M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"
      : "m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15";
    button.querySelector("svg path").setAttribute("d", svgPath);
  })
);

function likes(formData, isRemoved) {
  console.log("likes");
  axios.post("./api/like.php", formData).then((response) => {
    //send notification if like not removed
    console.log(isRemoved);
    console.log(response.data.senderID);
    console.log(response.data.receiverID);
    if (!isRemoved) {
      let notificationFormData = new FormData();
      notificationFormData.append("senderID", response.data.senderID);
      notificationFormData.append("receiverID", response.data.receiverID);
      axios.post("./api/createNotification.php", notificationFormData);
    }
  });
}
