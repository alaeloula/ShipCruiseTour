<?php
  class admin extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'SharePosts',
        'description' => 'Simple social network built on the TraversyMVC PHP framework'
      ];
     
      $this->view('admin/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
    public function contact(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/contact', $data);
    }
  }