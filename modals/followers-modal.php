<div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="followersModalLabel">Lista Seguaci</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Lista di utenti seguiti -->
        <ul id="followerList" class="list-group">
          <?php foreach ($followers as $follow): ?>
            <li class="list-group-item d-flex align-items-center">
              <div>
                <img src="img/<?php echo $follow['file_name'] ?>" class="avatar rounded-circle me-2" alt="Avatar utente">
                <a class="custom-link"
                  href="open-profile.php?username=<?php echo $follow['username'] ?>">@<?php echo $follow['username'] ?></a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>