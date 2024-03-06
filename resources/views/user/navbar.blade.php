<style>
    .active{
        background-color: black !important;
    }
    </style>
<nav class="navbar navbar-expand-lg shadow" style="background-color: #eee;">
    <div class="container">
        <a class="navbar-brand" href="#"> <span class="h2 fw-bold mb-0"><i class="bi bi-buildings-fill me-2"></i>EmplySys</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-pills gap-2">
                <li class="nav-item py-2">
                    <a class="nav-link {{ request()->path() == 'profile' ? 'active text-white' : '' }}  " aria-current="page" href="/profile">Profile</a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link {{ request()->path() == 'edit' ? 'active text-white' : '' }} " href="/edit">Edit</a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link " href="/logout">Logout</a>
                </li>


            </ul>

        </div>
    </div>
</nav>