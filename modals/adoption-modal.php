<link rel="stylesheet" href="css/style.css">
<div class="modal fade" id="adoption-modal" tabindex="-1" aria-labelledby="adoption-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adoption-modal-label">Adoption Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"
                        onclick="location.reload()"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" class="form-control" id="phoneNumber" placeholder="Enter your phone number" min="0">
                        </div>
                        <div class="form-group mt-3">
                            <label for="presentation">Presentation</label>
                            <textarea class="form-control" id="presentation" rows="3" maxlength="512" placeholder="Enter your presentation"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="submitButton" disabled>Submit</button>
                </div>
            </div>
        </div>
</div>

<script src="./js/adoptionModal.js"></script>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>