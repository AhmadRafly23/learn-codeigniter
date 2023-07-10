<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<p>Ini halaman Home</p>
<button class="tombol bg-red-400">Klik</button>
<?php $name = "ahmad"; ?>
<script>
    const buttonClick = document.querySelector('.tombol');

    buttonClick.addEventListener('click', function() {
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    });
</script>
<?= $this->endSection(); ?>