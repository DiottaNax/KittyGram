<?php $account = $dbh->getAccountFromUsername($_SESSION['username']); ?>

<link rel="stylesheet" href="css/style.css"> <!-- Assicurati di aggiornare il percorso corretto -->
<div class="modal fade" id="comment-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="comments"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title h5" id="comments">Commenti</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"
                    onclick="location.reload()"></button>
            </div>
            <div class="modal-body modal-body-comment">
                <ul id="commentsList"></ul>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <form action="#" id="commentForm" method="POST">
                        <div class="row d-flex justify-content">
                        <div class="d-flex align-items-center">
                            <input type="hidden" id="writer" name="writer" value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
                            <input type="hidden" id="input-post-owner" name="input-post-owner" value="">
                            <input type="hidden" id="input-post-id" name="input-post-id" value="">
                            <img src="img/<?php echo $account['pic'] ?>" class="small-avatar rounded-circle me-2 ms-2" alt="Avatar utente">
                            <textarea class="form-control transparent-input" placeholder="Purr back to this post" id="commentArea" maxlength=200 writer="<?php echo $_SESSION['username'] ?>"></textarea>
                        </div>
                            <div class="col-1 mt-2">
                                <button type="submit" class="btn btn-secondary" id="sendComment">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./utils/functions.js"></script>