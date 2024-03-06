<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;height:100% ">
    <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
        <span class="fs-4 text-center "><i class="bi bi-buildings-fill me-2"></i>EmplySys</span><br>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto vh-100">
        <li class="nav-item py-2">
            <a href="/adminDashboard" class="nav-link {{ request()->path() == 'adminDashboard' ? 'active' : '' }} text-white">
                <i class="bi bi-house me-2"></i>
                Dashboard 
            </a>
        </li>
        <li class="nav-item py-2">
            <a href="/importUsers" class="nav-link  {{ request()->path() == 'importUsers' ? 'active' : '' }} text-white">
                <i class="bi bi-person-fill-add me-2"></i>
                Bulk Employee Upload
            </a>
        </li>
        <li class="nav-item py-2">
            <a href="/addemp" class="nav-link text-white {{ request()->path() == 'addemp' ? 'active' : '' }}">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Add Employee
            </a>
        </li>
        <li class="nav-item py-2">
            <a href="/view" class="nav-link text-white {{ request()->path() == 'view' ? 'active' : '' }}">
                <i class="bi bi-eye-fill me-2"></i>
                View Employee
            </a>
        </li>
    </ul>

</div>