<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/header.php'; ?>

<body id="page-top">
    <div id="wrapper">
        <?php include_once 'components/sidebar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container">
                    <h3 class="text-dark mb-4 pt-4">Point of Sale</h3>
                    <div class="row">
                    <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Products</p>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include_once 'controllers/pos/pos-product-list.php'; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <h6 class="text-uppercase text-muted card-subtitle">TOTAL</h6>
                                    <h4 class="display-6 fw-bold card-title">Rp<?php include_once 'controllers/pos/pos-total.php'; ?></h4>
                                </div>
                                <div class="card-footer p-4">
                                    <form class="text-center" method="post">
                                        <div class="mb-3"><button class="btn btn-primary d-block w-100" type="button" data-bs-target="#purchase" data-bs-toggle="modal">Purchase&nbsp;</button></div>
                                    </form>
                                    <div class="card" style="margin-top: 16px;">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Items</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                                <table class="table table-hover table-bordered my-0" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Size</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php include_once 'controllers/pos/pos-history.php'; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="purchase">
        <div class="modal-dialog" role="document">
            <form action="controllers/pos/pos-transaction.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Point of Sale</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Purchase Confirmation&nbsp;</p>
                        <div class="card">
                            <div class="card-body text-center p-4">
                                <h6 class="text-uppercase text-muted card-subtitle">TOTAL</h6>
                                <h4 class="display-4 fw-bold card-title"><?php include 'controllers/pos/pos-total.php'; ?></h4>
                                <div class="mb-3"><input class="form-control" type="number" name="discount" placeholder="Discount "></div>
                                <div class="mb-3"><input class="form-control" type="number" name="amount" placeholder="Amount "></div>
                                <input type="hidden" name="total_sales" value="<?php include 'controllers/pos/pos-total.php'; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirmation">
        <div class="modal-dialog" role="document">
            <form action="controllers/pos/pos-delete-history.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to remove this product?</p>
                        <input type="hidden" name="history_id">
                        <input type="hidden" name="product_id">
                        <input type="hidden" name="product_qty">

                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="add-item">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Quantity</p>
                    <form class="text-center" action="controllers/pos/pos-add-item.php" method="post">
                        <input type="hidden" name="product_id">
                        <div class="mb-3"><input class="form-control" type="number" name="item_qty" value="1" placeholder="Quantity" required></div>
                        <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Add Item</button></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script>
        
        $('button[data-bs-target="#add-item"]').on('click', function() {
            var product_id = $(this).data('product-id');
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });
        });

        $('button[data-bs-target="#confirmation"]').on('click', function() {
            var product_id = $(this).data('product-id');
            var history_id = $(this).data('history-id');
            var qty = $(this).data('qty');
            
            $('input[name="history_id"]').each(function() {
                $(this).val(history_id);
            });

            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });


            $('input[name="product_qty"]').each(function() {
                $(this).val(qty);
            });
        });
    </script>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>