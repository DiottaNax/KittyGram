<div class="modal fade" id="new-post-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="AddNewPost"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5" id="AddNewPost">Add a new post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="insert-post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="img">Images</label>
                        <input type="file" class="form-control" id="img" name="img" multiple />
                    </div>
                    <div class="mb-2">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" name="desc" required></textarea>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="adoption" name="adoption">
                        <label class="form-check-label" for="adoption">Adoption</label>
                    </div>
                    <div class="mb-2">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <p id="result-post"></p>
                    <label for="login" hidden>Post it!</label>
                    <input class="btn w-100 my-2" type="submit" id="login" name="post" value="Post it!" />
                </form>
            </div>
        </div>
    </div>
</div>
<script src="utils/functions.js"></script>