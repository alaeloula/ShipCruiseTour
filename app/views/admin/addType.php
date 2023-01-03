<?php require APPROOT . '/views/inc/header.php';
 flash('product_message');
?>
<a href="<?= URLROOT ?>/admin/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add post</h2>
    <p>add port</p>
    <form action="<?php echo URLROOT; ?>/admin/addType" method="post">
        <div class="form-group">
            <label for="type">TypeChambre: <sup>*</sup></label>
            <input type="text" name="type" class="form-control form-control-lg <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['type']; ?>">
            <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="price">price: <sup>*</sup></label>
            <input type="number" min=1 name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
            <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="quantite">Quantite: <sup>*</sup></label>
            <input type="text" name="quantite" class="form-control form-control-lg <?php echo (!empty($data['quantite_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['quantite']; ?>">
            <span class="invalid-feedback"><?php echo $data['quantite_err']; ?></span>
        </div>

        <input type="submit" class="btn btn-success" value="submit">
    </form>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>