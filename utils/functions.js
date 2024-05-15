function reload() {
  location.reload();
}

function setupAdoptionCheckbox() {
  const adoptionCheckbox = document.getElementById("adoption");
  const cityInput = document.getElementById("city_name");

  adoptionCheckbox.addEventListener("change", function () {
    if (this.checked) {
      cityInput.removeAttribute("disabled");
    } else {
      cityInput.setAttribute("disabled", true);
      cityInput.value = ""; // Reset city input value
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  setupAdoptionCheckbox();
});
