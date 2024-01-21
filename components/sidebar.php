<?php
echo '<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-dark bg-gradient p-0">
<div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
        <div class="sidebar-brand-text mx-3"><span>POS Dashboard</span></div>
    </a>
    <hr class="sidebar-divider my-0" />
    <ul class="navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link" href="products.php"><i class="fas fa-table"></i><span>Products</span></a>
        <li class="nav-item"><a class="nav-link" href="point-of-sale.php"><i class="fas fa-table"></i><span>Point of Sale</span></a></li>
        <li class="nav-item"><a class="nav-link" href="sales.php"><i class="fas fa-table"></i><span>Sales Report</span></a></li>
    </ul>
    <div class="text-center d-none d-md-inline"><button id="sidebarToggle" class="btn rounded-circle border-0" type="button"></button></div>
</div>
</nav>';
?>