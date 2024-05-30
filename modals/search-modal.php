<!-- Scrollable modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-center">

                <!-- Search input -->
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="search" class="form-control" id="searchInput" name="searchInput" placeholder="username"
                        aria-label="Username" aria-describedby="addon-wrapping" autocomplete="off">
                </div>

            </div>
            <div class="modal-body" id="searchModalBody">
                <!-- Modal body should be setted with js -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="searchClose" name="searchClose" data-bs-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>