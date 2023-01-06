<?php
class admin extends Controller
{
  private $adminModel;
  public function __construct()
  {
    $this->adminModel = $this->Model('Adminm');
  }

  public function index()
  {
    if (isLoggedIn()) {

      $this->view('admin/index');
    } else {
      $this->view('pages/index');
    }
  }

  public function addPort()
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $data = [
        'TITLE' => trim($_POST['TITLE']),
        'pays' => trim($_POST['pays']),
        'TITLE_err' => '',
        'pays_err' => '',
      ];
      if (empty($data['TITLE'])) {
        $data['TITLE_err'] = 'Pleae enter TITLE';
      }
      if (empty($data['pays'])) {
        $data['pays_err'] = 'Pleae enter pays';
      }

      // Make sure errors are empty
      if (empty($data['TITLE_err']) && empty($data['pays_err'])) {

        // Validated
        if ($this->adminModel->addPort($data)) {
          flash('portadd_message', 'port added');
          redirect('admin/index/');
        } else {
          die("something went wrong");
        }
      } else {
        // Load view with errors
        $this->view('admin/addPort', $data);
      }
    } else {
      $data = [
        'TITLE' => '',
        'pays' => '',

      ];
      $this->view('admin/addPort', $data);
    }
  }


  public function addType()
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $data = [
        'type' => trim($_POST['type']),

        'type_err' => '',
        'price' => trim($_POST['price']),

        'price_err' => '',
        'quantite' => trim($_POST['quantite']),

        'quantite_err' => '',

      ];
      if (empty($data['type'])) {
        $data['type_err'] = 'Pleae enter type';
      }
      if (empty($data['price'])) {
        $data['price_err'] = 'Pleae enter price';
      }
      if (empty($data['quantite'])) {
        $data['quantite_err'] = 'Pleae enter quantite';
      }

      // Make sure errors are empty
      if (empty($data['type_err']) && empty($data['quantite_err']) && empty($data['price_err'])) {

        // Validated
        if ($this->adminModel->addType($data)) {
          flash('typeadd_message', 'new type added');
          redirect('admin/index/');
        } else {
          die("something went wrong");
        }
      } else {
        // Load view with errors
        $this->view('admin/addType', $data);
      }
    } else {
      $data = [
        'type' => '',
        'price' => '',
        'quantite' => '',
      ];
      $this->view('admin/addType', $data);
    }
  }
  public function addChambre()
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $data = [
        'type' => trim($_POST['type']),

        'type_err' => '',
        'price' => trim($_POST['price']),

        'price_err' => '',
        'navire' => trim($_POST['navire']),

        'navire_err' => '',

      ];
      if (empty($data['type'])) {
        $data['type_err'] = 'Pleae enter type';
      }
      if (empty($data['price'])) {
        $data['price_err'] = 'Pleae enter price';
      }
      if (empty($data['navire'])) {
        $data['quantite_err'] = 'Pleae enter quantite';
      }

      // Make sure errors are empty
      if (empty($data['type_err']) && empty($data['navire_err']) && empty($data['price_err'])) {

        // Validated
        if ($this->adminModel->addChambre($data)) {
          flash('roomadd_message', 'new room added');
          redirect('admin/index/');
        } else {
          die("something went wrong");
        }
      } else {
        // Load view with errors
        $this->view('admin/addChambre', $data);
      }
    } else {
      $navires = $this->adminModel->getNavire();
      $types = $this->adminModel->getType();
      $data = [
        'types' => $types,
        'price' => '',
        'navires' => $navires,
      ];
      $this->view('admin/addChambre', $data);
    }
  }
  public function addNavire()
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $data = [
        'nom' => trim($_POST['nom']),

        'nom_err' => '',


      ];
      if (empty($data['nom'])) {
        $data['nom_err'] = 'Pleae enter nom';
      }


      // Make sure errors are empty
      if (empty($data['nom_err'])) {

        // Validated
        if ($this->adminModel->addNavire($data)) {
          flash('shipadd_message', 'new ship added');
          redirect('admin/index/');
        } else {
          die("something went wrong");
        }
      } else {
        // Load view with errors
        $this->view('admin/addNavire', $data);
      }
    } else {

      $data = [
        'nom' => '',
      ];
      $this->view('admin/addNavire', $data);
    }
  }
  public function addCroisiere()
  {


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "./uploads/" . $filename;

      $data = [
        'traget' => $_POST['traget'],
        'traget_err' => '',
        'nom' => trim($_POST['nom']),
        'nom_err' => '',
        'navire' => trim($_POST['navire']),
        'navire_err' => '',
        'port' => $_POST['port'],
        'port_err' => '',
        'date_de_dep' => $_POST['date_de_dep'],
        'date_de_dep_err' => '',
        'nbrde_nuit' => $_POST['nbrde_nuit'],
        'nbrde_nuit_err' => '',
        'img' => $filename,
        'img_err' => '',

      ];
      if (empty($data['traget'])) {
        $data['traget_err'] = 'Pleae enter traget';
      }
      if (empty($data['nom'])) {
        $data['nom_err'] = 'Pleae enter nom';
      }
      if (empty($data['navire'])) {
        $data['navire_err'] = 'Pleae enter navire';
      }
      if (empty($data['port'])) {
        $data['port_err'] = 'Pleae enter port';
      }
      if (empty($data['date_de_dep'])) {
        $data['date_de_dep_err'] = 'Pleae enter date_de_dep';
      }
      if (empty($data['nbrde_nuit'])) {
        $data['nbrde_nuit_err'] = 'Pleae enter nbrde_nuit';
      }

      if (move_uploaded_file($tempname, $folder)) {

        $data['image_err'] = '';
      } else {
        $data['image_err'] = 'error img';
      }

      // Make sure errors are empty
      if (empty($data['traget_err']) && empty($data['nbrde_nuit_err']) && empty($data['date_de_dep_err']) && empty($data['port_err']) && empty($data['navire_err']) && empty($data['nom_err'])) {


        // Validated
        if ($this->adminModel->addCroisiere($data)) {
          flash('cruise_message', 'new cruise added');
          redirect('admin/index/');
        } else {
          die("something went wrong");
        }
      } else {
        // Load view with errors
        $this->view('admin/addCroisiere', $data);
      }
    } else {

      $navires = $this->adminModel->getNavire();
      $port = $this->adminModel->getPort();
      $data = [
        'nom' => '',
        'navires' => $navires,
        'port' => $port,
        'date_de_dep' => '',
        'nbrde_nuit' => '',
        'img' => '',
      ];
      $this->view('admin/addCroisiere', $data);
    }
  }
}
