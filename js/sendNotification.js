function sendNotificationUsingUsernames(
  sender_username,
  receiver_username,
  message,
  post_id
) {
  const notificationForm = new FormData();
  if (post_id != null) {
    notificationForm.append("post_id", post_id);
  }

  notificationForm.append("sender_username", sender_username);
  notificationForm.append("receiver_username", receiver_username);
  notificationForm.append("message", message);

  sendNotification(notificationForm);
}

function sendNotificationUsingId(sender_id, receiver_id, message, post_id) {
  const notificationForm = new FormData();
  if (post_id != null) {
    notificationForm.append("post_id", post_id);
  }

  notificationForm.append("sender_id", sender_id);
  notificationForm.append("receiver_id", receiver_id);
  notificationForm.append("message", message);
  sendNotification(notificationForm);
}

function sendNotification(notificationForm) {
  axios
    .post("./api/send-notification.php", notificationForm)
    .then((response) => {
      console.log("notification response:");
      console.log(response.data);
    });
}
