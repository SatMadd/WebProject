<h2>✍️ Kelola Artikel</h2>

<form method="POST" action="<?= base_url('admin/add_article'); ?>" class="mb-4">
    <input type="text" name="title" class="form-control mb-2" placeholder="Judul Artikel" required>
    <textarea name="content" class="form-control mb-2" rows="5" placeholder="Isi artikel..." required></textarea>
    <button class="btn btn-success">Tambah Artikel</button>
</form>

<table class="table table-dark">
<tr>
    <th>Judul</th>
    <th>Aksi</th>
</tr>

<?php foreach($articles as $a): ?>
<tr>
    <td><?= $a['title']; ?></td>
    <td>
        <a href="<?= base_url('admin/delete_article/'.$a['id']); ?>" class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
