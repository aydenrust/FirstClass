<?php

class planner {
 
	private $size;
    private $age;
    private $lang;
    private $quantity;
    private $ruler;
    private $pocket;
    private $bully;
    private $green;
    private $nutrition;
    private $cover;
    private $total;
 
	function __construct( $size, $age, $lang, $quantity, $ruler, $pocket, $bully, $green, $nutrition,$cover, $total ) {
		$this->size = $size;
        $this->age = $age;
        $this->lang = $lang;
        $this->quantity = $quantity;
        $this->ruler = $ruler;
        $this->pocket = $pocket;
        $this->bully = $bully;
        $this->green = $green;
        $this->nutrition = $nutrition;
        $this->cover = $cover;
        $this->total = $total;
    }

    function toString(){
        return "size: ". $this->size. " age: ". $this->age;
    }

    function getLang(){
        return $this->lang;
    }
}
?>