<?= $this->extend('template/layout'); ?>
<?= $this->section('content'); ?>
<section class="container mt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data['name']; ?></td>
                <td><?= $data['email']; ?></td>
            </tr>
        </tbody>
    </table>
</section>
<?= $this->endSection(); ?>