<?php
/*Ustawianie klasy figur*/
class Piece
{
    private $color;
    private $type;

    public function __construct(string $c, string $t)
    {
        $this->color = $c;
        $this->type = $t;
   }
    
    public function getHTML() : string
    {
        $c = $this->color;
        $t = $this->type;
        $html = "<img src=\"img/$c/$t.png\">";
        return $html;

    }
}
?>