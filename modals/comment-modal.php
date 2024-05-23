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
                            <img src="img/<?php echo $account['pic'] ?>" class="rounded-circle me-2 ms-2" alt="Avatar utente" style="width: 20px; height: 20px;">
                            <textarea class="form-control transparent-input" placeholder="Purr back to this post" id="commentArea" maxlength=200 writer="<?php echo $_SESSION['username'] ?>"></textarea>
                        </div>
                            <div class="col-1">
                                <button type="submit" class="btn" id="sendComment">Invia</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./utils/functions.js"></script>