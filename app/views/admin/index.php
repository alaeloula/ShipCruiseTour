<?php 
require APPROOT . '/views/inc/header.php';
echo "admin : " . $_SESSION['user_name'];
flash('portadd_message');
flash('typeadd_message');
?>

<div class="container">
    <div class="text-center">
        <h2 class="section-heading text-uppercase">dashbord gestion</h2>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 1-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="">
                    <div class="portfolio-hover">
                         <a href="<?php echo URLROOT ?>/admin/addCroisiere"><div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div></a>
                    </div>
                    <img class="img-fluid" src="<?= URLROOT . '/public/img/creud/cruise.jpg' ?>" alt="..." />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">croisiere</div>
                    <div class="portfolio-caption-subheading text-muted">Illustration</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 2-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                    <div class="portfolio-hover">
                    <a href="<?php echo URLROOT ?>/admin/addNavire"><div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div></a>
                    </div>
                    <img class="img-fluid" src="<?= URLROOT . '/public/img/creud/Ship.jpg' ?>" alt="..." />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">navir</div>
                    <div class="portfolio-caption-subheading text-muted">Graphic Design <?=URLROOT ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 3-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="<?php echo URLROOT ?>/admin/addPort">
                    <div class="portfolio-hover">
                        <a href="<?php echo URLROOT ?>/admin/addPort"><div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div></a>
                    </div>
                    <img class="img-fluid" src="<?= URLROOT . '/public/img/creud/port2.jpg' ?>" alt="..." />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">port</div>
                    <div class="portfolio-caption-subheading text-muted">Identity</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <!-- Portfolio item 4-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                    <div class="portfolio-hover">
                    <a href="<?php echo URLROOT ?>/admin/addChambre"><div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div></a>
                    </div>
                    <img class="img-fluid" src="<?= URLROOT . '/public/img/creud/room3.jpg' ?>" alt="..." />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">chambre</div>
                    <div class="portfolio-caption-subheading text-muted">Branding</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <!-- Portfolio item 4-->
            <div class="portfolio-item">
                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                    <div class="portfolio-hover">
                    <a href="<?php echo URLROOT ?>/admin/addType"><div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div></a>
                    </div>
                    <img class="img-fluid" src="<?= URLROOT . '/public/img/creud/room.jpg' ?>" alt="..." />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">type chambre</div>
                    <div class="portfolio-caption-subheading text-muted">Branding</div>
                </div>
            </div>
        </div>


    </div>
</div>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>