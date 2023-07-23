<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<div class="p-6 w-2/5">
    <form action="/comic/update/<?= $comic["id"]; ?>" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $comic["slug"]; ?>">
        <input type="hidden" name="oldCover" value="<?= $comic["cover"]; ?>">
        <div class="flex justify-between items-center">
            <label for="title">Title :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="title" name="title" placeholder="Example: Naruto" class="input input-bordered w-full" autofocus value="<?= old("title", $comic["title"]); ?>" />
                <?php if (session()->has('validation') && !empty(session('validation')["title"])) : ?>
                    <span class="text-red-500 text-xs italic mt-1"> <?= session('validation')["title"] ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="author">Author :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="author" name="author" placeholder="Example: Masashi Kishimoto" class="input input-bordered w-full" value="<?= old("author", $comic["author"]); ?>" />
                <?php if (session()->has('validation') && !empty(session('validation')["author"])) : ?>
                    <span class="text-red-500 text-xs italic mt-1"> <?= session('validation')["author"] ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="publisher">Publisher :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="publisher" name="publisher" placeholder="Example: Shounen Jump" class="input input-bordered w-full" value="<?= old("publisher", $comic["publisher"]); ?>" />
                <?php if (session()->has('validation') && !empty(session('validation')["publisher"])) : ?>
                    <span class="text-red-500 text-xs italic mt-1"> <?= session('validation')["publisher"] ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label>Cover :</label>
            <div class="w-full max-w-sm space-y-3">
                <img src="/img/<?= $comic["cover"]; ?>" alt="" class="img-preview w-36 h-40 rounded-lg object-cover border">
                <div>
                    <div class="container-file flex items-center border rounded-xl">
                        <input type="file" id="cover" name="cover" class="file-input w-28 text-transparent flex-none focus:outline-none" />
                        <label id="file-input-label" for="cover" class="text-gray-400 px-3 truncate"><?= $comic["cover"]; ?></label>
                    </div>
                    <?php if (session()->has('validation') && !empty(session('validation')["cover"])) : ?>
                        <span class="text-red-500 text-xs italic mt-1"><?= session('validation')["cover"] ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline text-blue-700 hover:bg-blue-700 hover:border-blue-700">Submit</button>
    </form>
</div>

<?= $this->endSection(); ?>