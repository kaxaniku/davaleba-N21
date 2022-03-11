<?php

namespace Pages;

use Models\NewsModel;


class News extends Page{

    function __construct() {
        $this->model = new NewsModel();
        Parent::__construct();
    }
    
    public function index() {
        $this->data['news'] = $this->model->GET_ALL();
        
        $this->load('views/frontend/news/index.php');

    }
}