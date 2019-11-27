<?php

class planner {
 
	private $size;
    private $age;
    private $lang;
    private $quantity;
    private $ruler;
    private $pocket;
    private $cover;
    private $total;
 
	function __construct( $size, $age, $lang, $quantity, $ruler, $pocket, $cover, $total ) {
		$this->size = $size;
        $this->age = $age;
        $this->lang = $lang;
        $this->quantity = $quantity;
        $this->ruler = $ruler;
        $this->pocket = $pocket;
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