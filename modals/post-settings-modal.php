<link rel="stylesheet" href="css/style.css">
<div class="modal fade" id="post-settings-modal" tabindex="-1" aria-labelledby="post-settings-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ms-2" id="post-settings-modal-label">Post Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" role="button" id="delete_post" name="delete_post"
                        data-post-id="<?php echo $currentPost['post_id'] ?>" data-owner-username="<?php echo $currentPost['owner']['username'] ?>">Delete Post</li>
                    <?php if ($isAdoption && !$currentPost['adopted']): ?>
                        <li class="list-group-item" role="button" id="mark_adopted" name="mark_adopted" data-post-id="<?php echo $currentPost['post_id'] ?>">Mark as adopted</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src=" ./js/post-settings-modal.js">
                        </script>
                        <!-- Bootstrap JS and dependencies -->
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>