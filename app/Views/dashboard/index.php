<?= $this->extend("layouts/layout"); ?>

<?= $this->section("content"); ?>
<p>Ini halaman Home</p>
<button class="tombol bg-red-400 mt">Klik</button>
<?php $name = "ahmad"; ?>
<script>
    const alert = document.querySelector('.alert');
    const alertText = document.querySelector('.alert-text');
    const buttonClick = document.querySelector('.tombol');

    buttonClick.addEventListener('click', function() {

        alert.classList.add("translate-y-0", "mt-4")

        return setTimeout(() => {
            alert.classList.remove("translate-y-0", "mt-4")
        }, 3000);
    });
</script>
<?= $this->endSection(); ?>