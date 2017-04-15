<?php

  require_once('Color.class.php');
  
  Class Vertex {
    public static $verbose = False;

    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;

    public static function doc() {
        return (file_get_contents('Vertex.doc.txt'));
    }

    function __construct(array $vertex) {
      if (array_key_exists('w', $vertex)) {
        $this->_w = floatval($vertex['w']);
      }
      else {
        $this->_w = 1.0;
      }
      if (array_key_exists('color', $vertex)) {
        $this->_color = $vertex['color'];
      }
      else {
        $this->_color = new Color( array( 'rgb' => 16777215 ) );
      }
      $this->_x = floatval($vertex['x']);
      $this->_y = floatval($vertex['y']);
      $this->_z = floatval($vertex['z']);
      if (self::$verbose) {
        printf($this->__toString() . " constructed\n");
      }
    }

    function __destruct() {
      if (self::$verbose) {
        printf($this->__toString() . " destructed\n");
      }
    }

    function __toString() {
    if (self::$verbose) {
      return (vsprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )', array($this->_x, $this->_y, $this->_z, $this->_w,
        (string)$this->_color)));
    }
    else 
      return (vsprintf('Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )', array($this->_x, $this->_y, $this->_z, $this->_w)));
    }

    public function getX() {
      return $this->_x;
    }
    public function getY() {
      return $this->_y;
    }
    public function getZ() {
      return $this->_z;
    }
    public function getW() {
      return $this->_w;
    }
    public function getColor() {
      return $this->_color;
    }
    public function setX($x) {
      $this->_x = $x;
    }
    public function setY($y) {
      $this->_y = $y;
    }
    public function setZ($z) {
      $this->_z = $z;
    }
    public function setW($w) {
      $this->_w = $w;
    }
    public function setColor($color) {
      $this->_color = $color;
    }

  }
?>