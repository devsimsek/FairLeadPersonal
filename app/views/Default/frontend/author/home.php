<?php
// Parsing the data from database
$users = get_table("users", "isActive=1");
?>
<main>
    <!-- Authors -->
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Authors</h2>
        <div class="row align-items-stretch g-4 py-5">
            <?php foreach ($users as $user): ?>
                <div class="col-md-12 py-5">
                    <a href="/author/<?= $user->username ?>" class="text-decoration-none text-white"><div class="pt-3">
                            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg">
                                <div class="text-white text-shadow-1">
                                    <div class="row p-3 d-flex justify-content-end text-end">
                                        <div class="d-block pb-3">
                                            <div class="card card-cover overflow-hidden text-white bg-dark rounded-5"
                                                 style="background-image: url('<?= base_url("assets/uploads/user/" . $user->image) ?>"
                                            ');">
                                            <span class="p-5"></span>
                                            <div class="d-flex flex-column h-100 ps-2 pe-2 pb-2 pt-5 text-white text-shadow-3 text-end">
                                        <span class="p-2 bg-dark rounded-2"
                                              style="--bs-bg-opacity: .5;">@<?= $user->username ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h4><?= $user->name ?> <?= $user->surname ?></h4>
                                        <p><?= $user->details ?></p>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>