<?php
abstract class Controller
{
    protected $model;
//hena ana barbot el model fel controler 
    public function __construct($model) {
        $this->model = $model;
    }
}
?>
