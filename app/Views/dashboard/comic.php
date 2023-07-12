<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<div class="w-screen md:w-[calc(100vw-20rem)] p-6">
    <a href="/comic/create" class="btn bg-blue-700 text-white font-medium border-none hover:bg-blue-800">Add Comic</a>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata("flash"); ?>"></div>
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
                        <td><a href="/comic/<?= $item["slug"]; ?>" class="btn btn-accent text-white mb-2"">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    const flashData = document.querySelector(" .flash-data").dataset.flashdata; if (flashData) { Swal.fire( 'Good job!' , `Data berhasil ${flashData}`, 'success' )}; </script>
                                <?= $this->endSection(); ?>