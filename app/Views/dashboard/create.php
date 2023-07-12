<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<div class="p-6 w-2/5">
    <form action="/comic/save" method="post" class="space-y-4">
        <div class="flex justify-between items-center">
            <label for="">Title :</label>
            <input type="text" id="title" name="title" placeholder="Type here" class="input input-bordered w-full max-w-sm" />
        </div>
        <div class="flex justify-between items-center">
            <label for="">Author :</label>
            <input type="text" id="author" name="author" placeholder="Type here" class="input input-bordered w-full max-w-sm" />
        </div>
        <div class="flex justify-between items-center">
            <label for="">Publisher :</label>
            <input type="text" id="publisher" name="publisher" placeholder="Type here" class="input input-bordered w-full max-w-sm" />
        </div>
        <div class="flex justify-between items-center">
            <label for="">Cover :</label>
            <input type="text" id="cover" name="cover" placeholder="Type here" class="input input-bordered w-full max-w-sm" />
        </div>
        <button type="submit" class="btn btn-outline text-blue-700 hover:bg-blue-700 hover:border-blue-700">Submit</button>
    </form>
</div>

<?= $this->endSection(); ?>