<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $employee) : ?>

            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $employee['name']; ?></td>
                <td><?= $employee['email']; ?></td>
                <td>
                    <a href="<?= base_url('call/detail/' . $employee['id']); ?>" class="btn btn-primary">Detail</a>
                    <a href="<?= base_url('call/update/' . $employee['id']); ?>" class="btn btn-primary">Update</a>
                    <a href="<?= base_url('call/delete/' . $employee['id']); ?>" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>