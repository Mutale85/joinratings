<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search Form</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-circle"></i></button>
            </div>
            <div class="modal-body">
                <form method="post" id="searchForm" action="search">
                    <div class="form-group">
                        <label class="mb-2">Enter NRC</label>
                        <div class="input-group">
                            <input type="text" name="id_searched" id="id_searched" class="form-control" placeholder="Enter NRC Number " required>
                            <button type="submit" id="submit_customer" class="btn btn-primary">Search</button>
                        </div>
                        <input type="hidden" name="org" id="org" class="form-control" value="<?php echo trim(base64_encode($_SESSION['parent_id']))?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-circle"></i></button>
            </div>
            <div class="modal-body">
                <div id="client_details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>