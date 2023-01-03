<?php require APPROOT . '/views/inc/header.php';
 flash('product_message');
?>
<a href="<?= URLROOT ?>/admin/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add post</h2>
    <p>add navire</p>
    <form action="<?php echo URLROOT; ?>/admin/addNavire" method="post">
        <div class="form-group">
            <label for="nom">nom: <sup>*</sup></label>
            <input type="text" name="nom" class="form-control form-control-lg <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nom']; ?>">
            <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
        </div>

        <input type="submit" class="btn btn-success" value="submit">
    </form>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>