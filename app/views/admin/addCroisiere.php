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
        <div class="form-group">

            <label for="navire">navire: <sup>*</sup></label>

            <select name="navire" id="">
                <?php
                foreach ($data['navires'] as $navire) { ?>
                    <option value="<?= $navire->id_n; ?>"><?= $navire->nom; ?></option>
                <?php  } ?>
            </select>

        </div>

        <div class="form-group">
            <label for="price">price: <sup>*</sup></label>
            <input type="text" name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
            <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>

        <div class="form-group">
            <label for="nbrde_nuit">nbrde_nuit: <sup>*</sup></label>
            <input type="text" name="nbrde_nuit" class="form-control form-control-lg <?php echo (!empty($data['nbrde_nuit_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nbrde_nuit']; ?>">
            <span class="invalid-feedback"><?php echo $data['nbrde_nuit_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="date_de_dep">date_de_dep: <sup>*</sup></label>
            <input type="date" name="date_de_dep" class="form-control form-control-lg <?php echo (!empty($data['date_de_dep_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['date_de_dep']; ?>">
            <span class="invalid-feedback"><?php echo $data['date_de_dep_err']; ?></span>
        </div>


        <div class="form-group">

            <label for="port">Port de depart: <sup>*</sup></label>
            <select name="port" id="">
                <?php
                foreach ($data['port'] as $port) { ?>
                    <option value="<?= $port->id_p; ?>"><?= $port->nom; ?></option>
                <?php  } ?>
            </select>
        </div>

        

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                
                <?php
                foreach ($data['port'] as $port) { ?>
                   <li> <label for="traget"><?= $port->nom; ?></label>
                    <input type="checkbox" name="traget" value="<?= $port->id_p; ?>" id=""></li>
                <?php  } ?>
                
                
            </ul>
        </div>
        <input type="submit" class="btn btn-success" value="submit">
    </form>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>