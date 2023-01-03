<?php require APPROOT . '/views/inc/header.php';


flash('product_message');
?>
<a href="<?= URLROOT ?>/admin/" class="btn btn-light"><i class="fa fa-backward"></i>back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add post</h2>
    <p>add chambre</p>
    <form action="<?php echo URLROOT; ?>/admin/addChambre" method="post">
        <div class="form-group">
            <label for="price">price: <sup>*</sup></label>
            <input type="number" min=1 name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
            <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="type">type: <sup>*</sup></label>
            <select name="type" id="">
                <?php
                foreach ($data['types'] as $type) { ?>
                    <option value="<?= $type->id_t; ?>"><?= $type->type; ?></option>

                <?php  } ?>

            </select>

        </div>
        <div class="form-group">
            <label for="navire">navire: <sup>*</sup></label>
            <select name="navire" id="">
                <?php
                foreach ($data['navires'] as $navire) { ?>
                    <option value="<?= $navire->id_n; ?>"><?= $navire->nom; ?></option>
                <?php  } ?>
            </select>

        </div>


        <input type="submit" class="btn btn-success" value="submit">
    </form>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>