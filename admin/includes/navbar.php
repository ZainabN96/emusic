<nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper py-3">
            <button class="btn btn-link navbar-vertical-toggle">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
        </div>
        <a class="navbar-brand text-left nav-logo" href="<?php echo $admin_path; ?>screens/pages/home.php">
            <div class="d-flex align-items-center py-3">
                <img src="<?php echo $site_path; ?>images/site/icon/logo.png" alt="">
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse perfect-scrollbar scrollbar" id="navbarVerticalCollapse">
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a class="nav-link dropdown-indicator" href="#music" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="music">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-music text-black"></span></span><span class="nav-link-text">Music Management</span>
                    </div>
                </a>
                <ul class="nav collapse" id="music" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/add-category.php">Add Category</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/list-category.php">Category List</a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/add-music.php">Add Music</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/list-music.php">Music List</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-indicator" href="#user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="user">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user text-primary"></span></span><span class="nav-link-text">Users Management</span>
                    </div>
                </a>
                <ul class="nav collapse" id="user" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/add-user.php">Add User</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/list-users.php">Users List</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-indicator" href="#order" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="order">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart text-warning"></span></span><span class="nav-link-text">Orders Management</span>
                    </div>
                </a>
                <ul class="nav collapse" id="order" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $admin_path; ?>screens/pages/list-orders.php">Orders List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
