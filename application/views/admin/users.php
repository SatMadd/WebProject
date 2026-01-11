<h2>👥 Manajemen User</h2>

<table class="table table-dark table-striped">
<thead>
<tr>
    <th>Username</th>
    <th>Role</th>
    <th>Status</th>
    <th>Online</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php foreach($users as $u): ?>
<tr>
    <td><?= $u['username']; ?></td>
    <td><?= $u['role']; ?></td>
    <td>
        <?= $u['is_banned'] ? '<span class="text-danger">Banned</span>' : 'Active'; ?>
    </td>
    <td>
        <?= $u['last_active'] ? '<span class="text-success">Online</span>' : 'Offline'; ?>
    </td>
    <td>
        <?php if(!$u['is_banned']): ?>
            <a href="<?= base_url('admin/ban/'.$u['id']); ?>" class="btn btn-danger btn-sm">Ban</a>
        <?php else: ?>
            <a href="<?= base_url('admin/unban/'.$u['id']); ?>" class="btn btn-success btn-sm">Unban</a>
        <?php endif; ?>

        <?php if($u['role'] == 'user'): ?>
            <a href="<?= base_url('admin/promote/'.$u['id']); ?>" class="btn btn-warning btn-sm">Promote</a>
        <?php else: ?>
            <a href="<?= base_url('admin/demote/'.$u['id']); ?>" class="btn btn-secondary btn-sm">Demote</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
