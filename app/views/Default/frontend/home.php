<?php
// Parsing the data from database
$postsTable = get_table("post", null, 4);
$featuredPosts = get_table("post", "isFeatured=1");
$flashPosts = get_table("post", "isFlash=1");
$categories = get_table("category");
?>
<main>
    <!-- Welcome Hero -->
    <div class="container my-5">
        <div class="alert alert-danger visually-hidden" id="errors" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-circle-fill fs-1"></i>
                <h1 class="alert-heading fw-bolder d-inline">&nbsp;<span id="error"></span></h1>
            </div>
            <hr>
            <p class="mb-0 fs-5" id="message"></p>
        </div>
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1"><?= $app->name ?? "devsimsek" ?></h1>
                <p class="lead"><?= $app->description ?? "A Personal Home For Internet Lovers." ?></p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <a class="btn btn-success btn-lg px-4 me-md-2 fw-bold" href="/posts">Posts</a>
                    <a class="btn btn-outline-secondary btn-lg px-4" href="/projects/all">Projects</a>
                    <a class="btn btn-outline-secondary btn-lg px-4" href="/p/about">About</a>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                <img class="rounded-lg-3" src="/assets/images/EfssKGNXsAAmGRa.png" alt="" width="360">
            </div>
        </div>
    </div>

    <!-- Featured Section -->
    <div class="container px-4 py-2 gap-4">
        <div class="row">
            <div class="col-md-12">
                <div id="FlashSlider" class="carousel slide pt-3 pb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i = 0;
                        foreach ($flashPosts as $post): ++$i ?>
                            <div class="carousel-item<?= ($i < 2) ? " active" : null ?>">
                                <div class="d-block w-100 card card-cover text-white bg-dark rounded-4 py-2 p-5 border"
                                     style="padding-right: 12%!important;padding-left: 12%!important;">
                                    <div class="p-2 d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                        <span class="badge bg-light me-3"><a
                                                    href="/category/<?= get_category($post->category)->slug ?>"
                                                    class="text-dark"><?= get_category($post->category)->name ?></a></span>
                                            <p class="mb-0"><a href="/post/<?= $post->slug ?>"
                                                               class="text-white"><?= $post->title ?></a></p>
                                        </div>
                                        <div class="d-flex">
                                            <span class="mr-3 text-light"><?= date("Y/m/d", strtotime($post->createdAt)) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#FlashSlider"
                            data-bs-slide="prev">
                        <span class="me-5 carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#FlashSlider"
                            data-bs-slide="next">
                        <span class="ms-5 carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="py-2 border-bottom">Featured Posts</h2>
                <div id="FairLeadHomeSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i = 0;
                        foreach ($featuredPosts as $post): ++$i ?>
                            <div class="carousel-item<?= ($i < 2) ? " active" : null ?>">
                                <div class="d-block w-100">
                                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 border mt-3"
                                         style="background-image: url('<?= base_url("assets/uploads/post/thumbnail/" . $post->image) ?>');">
                                        <div class="d-flex flex-column h-100 p-5 pb-5 text-white text-shadow-3">
                                            <div class="ms-4 pt-5 mt-5 mb-4"><h2
                                                        class="p-2 bg-dark fw-bold display-6 lh-1 rounded-2"
                                                        style="--bs-bg-opacity: .5;"><a
                                                            class="text-decoration-none text-white"
                                                            href="/post/<?= $post->slug ?>"><?= $post->title ?></a></h2>
                                            </div>
                                            <ul class="d-flex mt-5 list-unstyled mt-auto">
                                                <li class="me-auto">
                                                    <a class="text-decoration-none text-white p-2 bg-dark rounded-2"
                                                       style="--bs-bg-opacity: .5;"
                                                       href="/author/<?= get_author($post->author)->username ?>">
                                                        <img src="<?= base_url("assets/uploads/user/" . get_author($post->author)->image) ?>"
                                                             alt="<?= get_author($post->author)->username ?>"
                                                             width="32"
                                                             height="32"
                                                             class="rounded-circle border border-white"> <span
                                                                class="ms-2">@<?= get_author($post->author)->username ?></span>
                                                    </a>
                                                </li>
                                                <li class="d-flex align-items-center me-3">

                                                    <small class="p-2 bg-dark rounded-2"
                                                           style="--bs-bg-opacity: .5;"><a
                                                                href="/category/<?= get_category($post->category)->slug ?>"
                                                                class="text-decoration-none text-white"><?= get_category($post->category)->name ?></a></small>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <small class="p-2 bg-dark rounded-2"
                                                           style="--bs-bg-opacity: .5;"><?= date("Y/m/d", strtotime($post->createdAt)) ?></small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#FairLeadHomeSlider"
                            data-bs-slide="prev">
                        <span class="me-5 carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#FairLeadHomeSlider"
                            data-bs-slide="next">
                        <span class="ms-5 carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="text-end py-2 border-bottom">Categories</h2>
                <div class="pt-3">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg border">
                        <div class="text-white text-shadow-1">
                            <div class="row">
                                <div class="list-group list-group-flush text-end">
                                    <?php foreach ($categories as $category): ?>
                                        <a href="/category/<?= $category->slug ?>"
                                           class="list-group-item"><?= $category->name ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Posts -->
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Latest Posts</h2>
        <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
            <?php foreach ($postsTable as $post): ?>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                         style="background-image: url('<?= base_url("assets/uploads/post/thumbnail/" . $post->image) ?>');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <div class="pt-5 mt-5 mb-4"><h2 class="p-2 bg-dark fw-bold display-6 lh-1 rounded-2"
                                                            style="--bs-bg-opacity: .5;"><a
                                            class="text-decoration-none text-white"
                                            href="/post/<?= $post->slug ?>"><?= $post->title ?></a></h2></div>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <a class="text-decoration-none text-white p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;"
                                       href="/author/<?= get_author($post->author)->username ?>">
                                        <img src="<?= base_url("assets/uploads/user/" . get_author($post->author)->image) ?>"
                                             alt="<?= get_author($post->author)->username ?>"
                                             width="32"
                                             height="32"
                                             class="rounded-circle border border-white">
                                        <span class="ms-2">@<?= get_author($post->author)->username ?></span>
                                    </a>
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <small class="p-2 bg-dark rounded-2"
                                           style="--bs-bg-opacity: .5;"><a
                                                href="/category/<?= get_category($post->category)->slug ?>"
                                                class="text-decoration-none text-white"><?= get_category($post->category)->name ?></a></small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <small class="p-2 bg-dark rounded-2"
                                           style="--bs-bg-opacity: .5;"><?= date("Y/m/d", strtotime($post->createdAt)) ?></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-end">
            <a class="btn btn-outline-secondary btn-lg px-4 me-md-2 fw-bold"
               href="/posts">See All</a>
        </div>
    </div>

    <!-- Featured Projects -->
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom text-end">Featured Projects</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                     style="background-image: url('https://source.unsplash.com/random/?wood,oak,nature');">
                    <div class="d-flex flex-column h-100 p-5 text-white text-shadow-1">
                        <ul class="d-flex list-unstyled mt-auto pb-5">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                     class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#geo-fill"></use>
                                </svg>
                                <small class="p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;">Earth</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#calendar3"></use>
                                </svg>
                                <small class="p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;">3d</small>
                            </li>
                        </ul>
                        <div class="pt-5 mt-5 mb-4"><h2 class="p-2 bg-dark fw-bold display-6 lh-1 rounded-2"
                                                        style="--bs-bg-opacity: .5;">Short title, long jacket</h2></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                     style="background-image: url('https://source.unsplash.com/random/?wood,oak,nature');">
                    <div class="d-flex flex-column h-100 p-5 text-white text-shadow-1">
                        <ul class="d-flex list-unstyled mt-auto pb-5">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                     class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#geo-fill"></use>
                                </svg>
                                <small class="p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;">Earth</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#calendar3"></use>
                                </svg>
                                <small class="p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;">3d</small>
                            </li>
                        </ul>
                        <div class="pt-5 mt-5 mb-4"><h2 class="p-2 bg-dark fw-bold display-6 lh-1 rounded-2"
                                                        style="--bs-bg-opacity: .5;">Short title, long jacket</h2></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                     style="background-image: url('https://source.unsplash.com/random/?wood,oak,nature');">
                    <div class="d-flex flex-column h-100 p-5 text-white text-shadow-1">
                        <ul class="d-flex list-unstyled mt-auto pb-5">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                     class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#geo-fill"></use>
                                </svg>
                                <small class="p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;">Earth</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em">
                                    <use xlink:href="#calendar3"></use>
                                </svg>
                                <small class="p-2 bg-dark rounded-2"
                                       style="--bs-bg-opacity: .5;">3d</small>
                            </li>
                        </ul>
                        <div class="pt-5 mt-5 mb-4"><h2 class="p-2 bg-dark fw-bold display-6 lh-1 rounded-2"
                                                        style="--bs-bg-opacity: .5;">Short title, long jacket</h2></div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a class="btn btn-outline-secondary btn-lg px-4 me-md-2 fw-bold"
               href="/projects/all">See All</a>
        </div>
    </div>

    <div class="p-5 mb-4 bg-dark text-white shadow-lg rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Thank's For Visiting Me</h1>
            <p class="col-md-8 fs-4">
                I am doing my best to serve you interesting content every week. If you want an addon or you've found a
                bug please consider notifying me.
            </p>
            <a class="btn btn-primary btn-lg" href="mailto:devsimsek@outlook.com">Contact</a>
        </div>
    </div>
</main>