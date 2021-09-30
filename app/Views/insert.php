<?= $this->extend('template/layout'); ?>
<?= $this->section('content'); ?>
<h1>Inserts Data</h1>

<form action="<?= base_url('call/post'); ?>" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="InputName" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="InputEmail" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->endSection(); ?>