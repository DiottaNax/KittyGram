<link rel="stylesheet" href="css/style.css"> 
<div class="modal fade" id="new-post-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="AddNewPost"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5" id="AddNewPost">Add a new post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPostForm" name="addPostForm" enctype="multipart/form-data" action="./api/new-post.php" method="POST">
                    <div class="mb-2">
                        <label for="imgpost">Images</label>
                        <input type="file" class="form-control" id="imgpost" name="imgpost[]" multiple />
                    </div>
                    <div class="mb-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" maxlength="100" required></textarea>
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="adoption" name="adoption">
                        <label class="form-check-label" for="adoption">Adoption</label>
                    </div>
                    <div class="mb-2">
                        <label for="cityName">City</label>
                        <input type="text" class="form-control" id="cityName" name="cityName" disabled>
                    </div>
                    <p id="uploadResult"></p>
                    <label for="post" hidden>Post it!</label>
                    <input class="btn btn-secondary w-100 my-2" type="submit" id="post" name="post" value="Post it!" />
                </form>
            </div>
        </div>
    </div>
</div>

<script src="./utils/functions.js"></script>
<script src="./js/addPost.js"></script>
