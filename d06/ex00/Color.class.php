<?php
  Class Color {

    public static $verbose = False;

    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static function doc() {
        return (file_get_contents('Color.doc.txt'));
    }

    function __construct(array $color) {
      if (isset($color['red']) && isset($color['green']) && isset($color['blue'])) {
          $this->red = intval($color['red']);
          $this->green = intval($color['green']);
          $this->blue = intval($color['blue']);
      }
      else if (isset($color['rgb'])) {
          $this->red = intval($color['rgb'] >> 16) & 0xff;
          $this->green = intval($color['rgb'] >> 8) & 0xff;
          $this->blue = intval($color['rgb']) & 0xff;
      }
      if (self::$verbose) {
          printf($this->__toString() . " constructed.\n");
      }
    }

    function __destruct() {
      if (self::$verbose) {
        printf($this->__toString() . " destructed.\n");
      }
    }

    function __toString() {
       return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
    }

    public function add($rhs) {
       return (new Color(array('red' => $this->red + $rhs->red, 'green' => $this->green + $rhs->green, 'blue' => $this->blue + $rhs->blue)));
    }

    public function sub($rhs) {
       return (new Color(array('red' => $this->red - $rhs->red, 'green' => $this->green - $rhs->green, 'blue' => $this->blue - $rhs->blue)));
    }

    public function mult($f) {
       return (new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f)));
    }

  }
?>