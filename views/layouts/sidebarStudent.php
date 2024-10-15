<!-- Sidebar Layout -->
<div>
    <div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">AdminSphere</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto" id="sidebarTabs">
                <li class="nav-item">
                    <a href="?page=dashboard" class="nav-link <?= $page == "uploadmaterial" ? 'active' : '' ?> text-dark" data-tab="upload">
                        <i class="fa fa-tachometer me-2" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=coursematerials" class="nav-link <?= $page == "coursematerials" ? 'active' : '' ?> text-dark" data-tab="upload">
                        <i class="fa fa-book me-2" aria-hidden="true"></i>
                        Course Materials
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=submitassignment" class="nav-link <?= $page == "submitassigment" ? 'active' : '' ?> text-dark" data-tab="upload">
                        <i class="fa fa-upload me-2" aria-hidden="true"></i>
                        Submit Assignment
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=accessgrades" class="nav-link <?= $page == "accessgrades" ? 'active' : '' ?> text-dark" data-tab="upload">
                        <i class="fa fa-file-word-o me-2" aria-hidden="true"></i>
                        Access Grades
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=financialstatus" class="nav-link <?= $page == "financialstatus" ? 'active' : '' ?> text-dark" data-tab="upload">
                        <i class="fa fa-credit-card-alt me-2" aria-hidden="true"></i>
                        Financial Status
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=settings" class="nav-link <?= $page == "settings" ? 'active' : '' ?> text-dark" data-tab="upload">
                        <i class="fa fa-cog me-2" aria-hidden="true"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../action/logoutAction.php" class="nav-link text-danger" data-tab="upload">
                        <i class="fa fa-cog me-2" aria-hidden="true"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>