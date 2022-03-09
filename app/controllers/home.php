<?php

class home extends controller{

    public function index( $name=''){
      $user=$this->model('user');
      $user->name=$name;

      $this->view('home/index',['name'=>$user->name]);
     
    }
    

}

?>