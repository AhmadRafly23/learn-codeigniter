<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<div>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Cover</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($comic as $item) : ?>
                    <tr>
                        <th><?= $i++; ?></th>
                        <td><img class="h-28 w-14 object-contain" src="<?= $item["cover"]; ?>" alt=""></td>
                        <td><?= $item["title"]; ?></td>
                        <td><a href="/comic/<?= $item["slug"]; ?>" class="btn bg-blue-700 text-white font-medium border-none hover:bg-blue-800">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>