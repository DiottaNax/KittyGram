document
  .getElementById("signupForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    var form = document.getElementById("signupForm");
    var formData = new FormData(form);

    // Get password and confirm password
    var password = formData.get("password");
    var confirmPassword = formData.get("confirmPassword");

    // Check if passwords match
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return;
    }

    // Hash password using SHA-512
    var hashedPassword = sha512(password);

    // Set the hashed password back to the form data
    formData.set("password", hashedPassword);

    // Send the form data via POST request
    fetch("../api/register.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error("Network response was not ok.");
        }
      })
      .then((data) => {
        // Handle success response
        console.log(data);
      })
      .catch((error) => {
        // Handle error
        console.error("There was an error with the request:", error);
      });
  });

// SHA-512 hashing function
function sha512(str) {
  return crypto.subtle
    .digest("SHA-512", new TextEncoder().encode(str))
    .then((hash) => {
      return Array.from(new Uint8Array(hash))
        .map((byte) => {
          return ("0" + byte.toString(16)).slice(-2);
        })
        .join("");
    });
}
