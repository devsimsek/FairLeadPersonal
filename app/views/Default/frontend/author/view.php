<?php
// Post Not Found
$data ?? redirect("/?error=cnf");
// Post Data
$postsTable = get_table("post", "author='" . $data->author->id . "'");
?>
<main class="pt-5">
    <div class="container px-4 py-2">
        <div class="row">
            <div class="col-md-12 py-5">
                <h2 class="text-start py-2 border-bottom">About Author</h2>
                <div class="pt-3">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg">
                        <div class="text-white text-shadow-1">
                            <div class="row p-3 d-flex justify-content-end text-end">
                                <div class="d-block pb-3">
                                    <div class="card card-cover overflow-hidden text-white bg-dark rounded-5"
                                         style="background-image: url('<?= base_url("assets/uploads/user/" . $data->author->image) ?>"
                                    ');">
                                    <span class="p-5"></span>
                                    <div class="d-flex flex-column h-100 ps-2 pe-2 pb-2 pt-5 text-white text-shadow-3 text-end">
                                        <span class="p-2 bg-dark rounded-2"
                                              style="--bs-bg-opacity: .5;">@<?= $data->author->username ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h4><?= $data->author->name ?> <?= $data->author->surname ?></h4>
                                <p><?= $data->author->details ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 py-5 text-end">
            <div class="container">
                <h2>Posts</h2>
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
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center me-3">
                                            <small class="p-2 bg-dark rounded-2"
                                                   style="--bs-bg-opacity: .5;"><a
                                                        href="/category/<?= get_category($post->category)->slug ?>"
                                                        class="text-decoration-none text-white"><?= get_category($post->category)->name ?></a></small>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <svg class="bi me-2" width="1em" height="1em">
                                                <use xlink:href="#calendar3"></use>
                                            </svg>
                                            <small class="p-2 bg-dark rounded-2"
                                                   style="--bs-bg-opacity: .5;"><?= date("Y/m/d", strtotime($post->createdAt)) ?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>