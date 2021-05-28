<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span data-toggle="modal" data-target="#addModal">
                <button title="Add Product" class="btn btn-primary"><i class="fas fa-plus-circle"></i></button>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="categoryTable" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-products">
                    <?php foreach ($model['listCate'] as $item): ?>
                      <tr>
                        <td><?php echo $item['ID']; ?></td>
                        <td><?php echo $item['CateName']; ?></td>
                        <td><?php echo $item['DisplayOrder']; ?></td>
                        <td>
                            <?php if ($item['Status']==1): ?>
                                <label style="color: green; font-weight: bold;">Activated</label>
                            <?php else: ?>
                                <label style="color: red; font-weight: bold;">Locked</label>
                            <?php endif; ?>
                        </td>
                        <td>
                          <span
                            onclick="passDataEditCategory(
                              <?php echo $item['ID']; ?>,
                              '<?php echo $item['CateName']; ?>',
                              <?php echo $item['DisplayOrder']; ?>
                            );"
                            data-toggle="modal"
                            data-target="#editModal">
                            <button title="Edit" class="btn btn-success mb-2"><i class="fas fa-edit"></i></button>
                          </span>
                          <span onclick="passDataRemove(<?php echo $item['ID'] ?>,'<?php echo $item['CateName']; ?>')" data-toggle="modal" data-target="#removeModal">
                            <button title="Remove" class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i></button>
                          </span>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add-category-form">
                    <div class="form-group">
                        <label>Categories Name</label>
                        <input type="text" autocomplete="off" name="add-cateName" class="form-control" placeholder="Enter categoriy name ...">
                    </div>
                    <div class="modal-footer">
                        <a id="addCategory" type="button" class="btn btn-primary disabled" data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add modal -->

<!-- edit modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-category-form">
                    <input type="hidden" name="id-edit" />
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" autocomplete="off" name="edit-cate-name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Display Order</label>
                        <input type="text" autocomplete="off" name="edit-displayorder" class="form-control">
                    </div>             
                    <div class="modal-footer">
                        <a id="editCategory" type="button" class="btn btn-success" data-dismiss="modal">Save</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end edit modal -->

<!-- remove modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">REMOVE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id-remove" />
                Are you sure you wanna remove <label style="font-weight:bold;color:red;"></label> ?
            </div>
            <div class="modal-footer">
                <button onclick="removeItem(3)" type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end remove modal -->

<!-- toast -->
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="position: fixed; top: 2.5rem; right: 1rem; width: 17%;">
    <div class="toast-header">
        <strong id="titleToast" class="mr-auto"></strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div style="display:flex;justify-content:space-between;align-items:center;" class="toast-body">
        <div id="iconToast">

        </div>
        <div id="contentToast">

        </div>
    </div>
</div>
<!-- end toast -->