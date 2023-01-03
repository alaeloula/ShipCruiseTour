<?php require APPROOT . '/views/inc/header.php';
 flash('product_message');
?>
<a href="<?= URLROOT ?>/admin/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add post</h2>
    <p>add port</p>
    <form action="<?php echo URLROOT; ?>/admin/addPort" method="post">
        <div class="form-group">
            <label for="TITLE">TITLE: <sup>*</sup></label>
            <input type="text" name="TITLE" class="form-control form-control-lg <?php echo (!empty($data['TITLE_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['TITLE']; ?>">
            <span class="invalid-feedback"><?php echo $data['TITLE_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="pays">Pays: <sup>*</sup></label>
            <input type="pays" name="pays" class="form-control form-control-lg <?php echo (!empty($data['pays_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['pays']; ?>">
            <span class="invalid-feedback"><?php echo $data['pays_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="submit">
    </form>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>