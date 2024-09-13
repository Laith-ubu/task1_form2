<?php 
class controller{

    protected $conn;

    public function __construct() {

    //  echo"parent constructor<br> ";
    
    }

    public function index(){
        return "INSIDE INDEX/CONTROLLER";
    }
    protected function render($view, $data = [])
    {
       

    }

}

?>