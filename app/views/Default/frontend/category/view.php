<?php
$categories = get_table("category");
?>
<main>
    <div class="container px-4 py-5">
        <h1 class="text-end py-4">Categories</h1>
        <?php $posts = get_table("post", "category=" . $data->category->id) ?>
        <div class="col">
            <h2 class="pb-2 border-bottom"><?= $data->category->name ?></h2>
            <div class="row row-cols-1 row-cols-lg-2 align-items-stretch g-4 py-5">
                <?php foreach ($posts as $post): ?>
                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                             style="background-image: url('<?= base_url("assets/uploads/post/thumbnail/" . $post->image) ?>');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <div class="pt-5 mt-5 mb-4"><h2
                                            class="p-2 bg-dark fw-bold display-6 lh-1 rounded-2"
                                            style="--bs-bg-opacity: .5;"><a
                                                class="text-decoration-none text-white"
                                                href="/post/<?= $post->slug ?>"><?= $post->title ?></a></h2>
                                </div>
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
        </div>
    </div>
</main>