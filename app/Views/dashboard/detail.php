<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<div class="flex h-full justify-center items-center p-6">
    <div class="w-full md:w-1/3 card card-side bg-base-100 shadow-xl">
        <figure><img class="w-56" src="<?= $comic["cover"]; ?>" alt="Movie" /></figure>
        <div class="p-5 flex flex-col justify-between">
            <div class="space-y-4">
                <h2 class="card-title"><?= $comic["title"]; ?></h2>
                <p><strong>Penulis :</strong> <?= $comic["author"]; ?></p>
                <p class="text-sm text-gray-400"><strong>Penerbit :</strong> <?= $comic["publisher"]; ?></p>
            </div>
            <div class="space-x-1">
                <a href="" class="btn btn-warning text-white border-none">Edit</a>
                <a href="" class="btn btn-error text-white border-none">Delete</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>