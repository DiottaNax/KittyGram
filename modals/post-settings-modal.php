<link rel="stylesheet" href="css/style.css">
<div class="modal fade" id="post-settings-modal" tabindex="-1" aria-labelledby="post-settings-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ms-2" id="post-settings-modal-label">Post Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"
                    onclick="location.reload()"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Delete Post</li>
                    <?php if ($isAdoption): ?>
                        <li class="list-group-item">Mark as adopted</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="./js/post-settings-modal.js"></script>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>