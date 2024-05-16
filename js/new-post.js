document.addEventListener("DOMContentLoaded", function () {
  const insertPostForm = document.getElementById("new-post");
  console.log("new-post.js");
  insertPostForm.addEventListener("submit", function (event) {
    console.log("submit");
    event.preventDefault();
    saveFormData();
  });

  async function saveFormData() {
    try {
      console.log("saveFormData");
      const formData = new FormData();
      formData.append(
        "description",
        document.getElementById("description").value
      );
      const city = document.getElementById("city_name").value;
      if (city) {
        formData.append("city_name", city);
      } else {
        formData.append("city_name", "Unknown");
      }

      const response = await axios.post("api/new-post.php", formData);

      if (response.data["insertDone"]) {
        console.log("dentro a insert");
        document.getElementById("result-post").innerText = "Insert done !!";
        const postId = response.data["post_id"];
        await handleImageUpload(postId); // Chiamata per caricare le immagini
      } else {
        document.getElementById("result-post").innerText =
          response.data.errorInsert;
      }
    } catch (error) {
      console.error("Error:", error);
      document.getElementById("result-post").innerText =
        "An error occurred while saving the post.";
    }
  }

  async function handleImageUpload(postId) {
    console.log("handleImageUpload");
    const fileInput = document.getElementById("img");

    if (fileInput.files.length > 0) {
      const uploadPromises = [];

      for (let i = 0; i < fileInput.files.length; i++) {
        const formDataImage = new FormData();
        formDataImage.append("file_name", fileInput.files[i]);

        const uploadPromise = axios
          .post("./api/upload-image.php", formDataImage)
          .then((responseUpload) => {
            if (!responseUpload.data.uploadDone) {
              throw new Error(responseUpload.data.errorInUpload);
            }
            return responseUpload.data.file_name; // Il nome del file viene restituito
          });

        uploadPromises.push(uploadPromise);
      }

      try {
        const fileNames = await Promise.all(uploadPromises);
        for (let i = 0; i < fileNames.length; i++) {
          const formDataFile = new FormData();
          formDataFile.append("post_id", postId);
          formDataFile.append("file_name", fileNames[i]);
          const result = await axios.post(
            "./api/add-img-to-file.php",
            formDataFile
          );
        }
      } catch (error) {
        console.error("Error during image upload:", error);
        document.getElementById("result-post").innerText =
          "An error occurred during image upload.";
      }
    }
  }
});
