<!-- navbar container -->
<header class="nav p-2 fixed-top bg-white pb-3">
  <div class="container">
    <div class="row">
      <div class="col text-start mt-1">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          fill="currentColor"
          class="bi bi-house-door"
          viewBox="0 0 16 16"
        >
          <path
            d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"
          />
        </svg>
      </div>
      <div class="col text-start mt-1">
        <svg
          id="newpostIcon"
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          fill="currentColor"
          class="bi bi-plus-circle"
          viewBox="0 0 16 16"
          data-bs-toggle="modal"
          data-bs-target="#newpostModal"
        >
          <path
            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
          />
          <path
            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
          />
        </svg>
      </div>
      <div class="col text-center mt-1">
        <img
          src="img/KittyGram_Logo.png"
          alt="Kittygram"
          width="200"
          height="auto"
        />
      </div>
      <div class="col text-end mt-1">
        <a href="UserProfile.html">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            fill="#000000"
            class="bi bi-person-circle"
            viewBox="0 0 16 16"
          >
            <path fill="#000000" d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path
              fill="#000000"
              fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
            />
          </svg>
        </a>
      </div>
      <div class="col text-end mt-1">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          class="bi bi-bell"
          viewBox="0 0 16 16"
          data-bs-toggle="offcanvas"
          data-bs-target="#notificationTab"
        >
          <path
            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"
          />
        </svg>
      </div>
    </div>
  </div>
</header>

<!-- Finestra modale "NEW POST" -->
<div
  class="modal fade"
  id="newpostModal"
  tabindex="-1"
  aria-labelledby="newpostModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: var(--bg-color)">
      <!-- stile specifico del colore della finestra -->
      <div class="modal-header">
        <h5 class="modal-title" id="newpostModalLabel">Create a new post</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <!-- Centra il contenuto orizzontalmente -->
        <div class="mb-3">
          <label class="btn btn-secondary">
            Select Photo or Video <input type="file" style="display: none" />
          </label>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Tab delle notifiche (Offcanvas) -->
<div
  class="offcanvas offcanvas-end"
  tabindex="-1"
  id="notificationTab"
  aria-labelledby="notificationTabLabel"
>
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="notificationTabLabel">Notifiche</h5>
    <!-- Pulsante di chiusura -->
    <button
      type="button"
      class="btn-close text-reset"
      data-bs-dismiss="offcanvas"
      aria-label="Close"
    ></button>
  </div>
  <div class="offcanvas-body">
    <!-- Contenuto delle notifiche -->
    <div class="notification-content">
      <!-- Inserisci qui il contenuto delle notifiche -->
      <div class="d-flex align-items-center mb-3">
        <img
          src="img/Nax_ProfilePic.JPG"
          class="rounded-circle me-2"
          alt="Avatar utente"
          style="width: 40px; height: 40px"
        />
        <div class="flex-grow-1">
          <h6 class="mb-0"><strong>nax</strong> started following you</h6>
        </div>
        <button
          id="followButtonNavbar"
          type="button"
          class="btn btn-light ml-auto opacity-100"
          onclick="toggleFollowNavbar()"
        >
          Following
        </button>
      </div>
      <div class="d-flex align-items-center mb-3">
        <img
          src="img/Morgan_ProfilePic.jpg"
          class="rounded-circle me-2"
          alt="Avatar utente"
          style="width: 40px; height: 40px"
        />
        <div class="flex-grow-1">
          <h6 class="mb-0"><strong>morgan</strong> liked your post</h6>
        </div>
        <img
          src="img/cat-example1.jfif"
          alt="Post image"
          style="width: 40px; height: 40px"
        />
      </div>
    </div>
  </div>
</div>
