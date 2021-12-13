<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/todos">
            <img src="{{ asset('logo.jpeg') }}" alt="Todos App" width="150" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/todos">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/todos/list">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/ajax">Ajax</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
