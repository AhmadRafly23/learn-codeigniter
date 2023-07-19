<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<div class="p-6 w-2/5">
    <form action="/comic/update/<?= $comic["id"]; ?>" method="post" class="space-y-4">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $comic["slug"]; ?>">
        <div class="flex justify-between items-center">
            <label for="title">Title :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="title" name="title" placeholder="Example: Naruto" class="input input-bordered w-full" autofocus value="<?= old("title", $comic["title"]); ?>" />
                <?php if ($validation && $validation->getError("title")) : ?>
                    <span class="text-red-500 text-xs italic mt-1"><?= $validation->getError("title"); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="author">Author :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="author" name="author" placeholder="Example: Masashi Kishimoto" class="input input-bordered w-full" value="<?= old("author", $comic["author"]); ?>" />
                <?php if ($validation && $validation->getError("author")) : ?>
                    <span class="text-red-500 text-xs italic mt-1"><?= $validation->getError("author"); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="publisher">Publisher :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="publisher" name="publisher" placeholder="Example: Shounen Jump" class="input input-bordered w-full" value="<?= old("publisher", $comic["publisher"]); ?>" />
                <?php if ($validation && $validation->getError("publisher")) : ?>
                    <span class="text-red-500 text-xs italic mt-1"><?= $validation->getError("publisher"); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <label for="cover">Cover :</label>
            <div class="w-full max-w-sm">
                <input type="text" id="cover" name="cover" placeholder="Type here" class="input input-bordered w-full" value="<?= old("cover", $comic["cover"]); ?>" />
                <?php if ($validation && $validation->getError("cover")) : ?>
                    <span class="text-red-500 text-xs italic mt-1"><?= $validation->getError("cover"); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-outline text-blue-700 hover:bg-blue-700 hover:border-blue-700">Submit</button>
    </form>
</div>

<?= $this->endSection(); ?>