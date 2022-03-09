<?php

class students extends controller {
    public function __construct()
    {
        $this->model=$this->model('student');
    }
    public function showAllstudent(){    
    $students= $this->model->getAllstudent();
    $this->view('home/studentview', ['students' =>$students]);
}
}
// $score= new controllstudent();
// $results=$score->showAllstudent();