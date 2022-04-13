<!-- Header -->
<header class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><?= $app->name ?? "devsimsek" ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#FairLeadNavigation"
                aria-controls="FairLeadNavigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="FairLeadNavigation">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (isset($page) && $page->slug == "home") ? "active" : null ?>"
                       aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($page) && $page->slug == "categories") ? "active" : null ?>"
                       aria-current="page"
                       href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($page) && $page->slug == "posts") ? "active" : null ?>"
                       aria-current="page"
                       href="/posts">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (isset($page) && $page->slug == "authors") ? "active" : null ?>"
                       aria-current="page"
                       href="/authors">Authors</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <div class="nav-link">
                        <form class="d-flex" method="get" action="/search">
                            <!--<input type="text" name="error" value="0xnr" hidden>-->
                            <input class="form-control me-2" type="search" placeholder="Search Keywords"
                                   aria-label="Search"
                                   name="sq">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <button class="btn btn-outline-secondary" onclick="switchTheme()">
                            <i class="bi bi-brightness-alt-high-fill"></i>
                        </button>
                        <span class="d-lg-none">Switch Theme</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>