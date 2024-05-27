<link rel="stylesheet" href="css/style.css">
<div class="modal fade" id="adoption-modal" tabindex="-1" aria-labelledby="adoption-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-house-heart custom-icon" viewBox="0 0 16 16">
                        <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982"/>
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                    </svg>
                    <h5 class="modal-title ms-2" id="adoption-modal-label">Adoption Request</h5>
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