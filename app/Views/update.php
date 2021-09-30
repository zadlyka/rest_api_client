<?= $this->extend('template/layout'); ?>
<?= $this->section('content'); ?>
<h1>Edit Data</h1>
<form action="<?= base_url('call/put/' . $data['id']); ?>" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="EditName" value="<?= $data['name']; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="EditEmail" value="<?= $data['email']; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->endSection(); ?>