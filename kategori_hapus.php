<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori=$id");
?>
<script>
    alert('Hapus Kategori Berhasil!');
    location.href = '?page=kategori';
</script>