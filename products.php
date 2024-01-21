<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/header.php'; ?>

<body id="page-top">
    <div id="wrapper">
        <?php include_once 'components/sidebar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4 pt-4">Inventory Management</h3>
                    <div class="row">
                    <div class="col-md-12 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Products</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php include_once 'controllers/products/total-products.php' ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary btn-icon-split" type="button" data-bs-target="#add-product" data-bs-toggle="modal"><span class="text-white-50 icon"><i class="fas fa-download"></i></span><span class="text-white text">Add Product</span></button>

                    <div class="card shadow mt-4">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Product List</p>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover table-bordered my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once 'controllers/products/product-list.php'; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="add-product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Product Information</p>
                    <form class="text-center" action="controllers/products/add-product.php" method="post">
                        <div class="mb-3"><input class="form-control" type="text" pattern="^(?!\s).*$" name="product_name" placeholder="Product Name" required=""></div>
                        <div class="mb-3"><input class="form-control" type="number" name="size" placeholder="Size" required=""></div>
                        <div class="mb-3"><input class="form-control" type="number" name="qty" placeholder="Quantity"></div>
                        <div class="mb-3"><input class="form-control" type="number" name="price" placeholder="Price" required=""></div>
                        <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Add Product</button></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update-product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Product Information</p>
                    <form class="text-center" action="controllers/products/update-product.php"  method="post">
                        <input type="hidden" name="product_id">
                        <div class="mb-3"><input class="form-control" type="text" pattern="^(?!\s).*$" name="product_name" placeholder="Product Name" required=""></div>
                        <div class="mb-3"><input class="form-control" type="number" name="size" placeholder="Size" required=""></div>
                        <div class="mb-3"><input class="form-control" type="number" name="qty" placeholder="Quantity"></div>
                        <div class="mb-3"><input class="form-control" type="number" name="price" placeholder="Price" required=""></div>
                        <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Update Product</button></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <p>Are you sure you want to remove this product?</p>
                </div>
                <form action="controllers/products/delete-product.php" method="post">
                <input type="hidden" name="product_id">
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script>
        $('button[data-bs-target="#update-product"]').on('click', function() {
            var product_id = $(this).data('product-id');
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });
        });

        $('button[data-bs-target="#confirmation"]').on('click', function() {
            var product_id = $(this).data('product-id');
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });
        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>