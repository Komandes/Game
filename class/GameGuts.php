<?php
/*Figury i plansza*/
require('Pice.class.php');
class GameMenager
{
    private $board;
        public function __construct()
        {
            $this->board = array();
            $this->board['E8'] = new Piece('Black', 'King');
            $this->board['D8'] = new Piece('Black', 'Queen');
            $this->board['C8'] = new Piece('Black', 'Bishop');
            $this->board['F8'] = new Piece('Black', 'Bishop');
            $this->board['A8'] = new Piece('Black', 'rook');
            $this->board['H8'] = new Piece('Black', 'rook');
            $this->board['B8'] = new Piece('Black', 'Knight');
            $this->board['G8'] = new Piece('Black', 'Knight');

            $this->board['E1'] = new Piece('White', 'King');
            $this->board['D1'] = new Piece('White', 'Queen');
            $this->board['C1'] = new Piece('White', 'Bishop');
            $this->board['F1'] = new Piece('White', 'Bishop');
            $this->board['A1'] = new Piece('White', 'rook');
            $this->board['H1'] = new Piece('White', 'rook');
            $this->board['B1'] = new Piece('White', 'Knight');
            $this->board['G1'] = new Piece('White', 'Knight');
        }
            public function getboardHTML() : string
            {
                 $html = "<div id=\"grid-container\">";
                for ($i=8; $i >=1 ; $i--)
                {
                for($j=65; $j <=72 ; $j++) {
                    $position = chr($j).$i;
                if( ($i + $j) % 2 )
                    $class = "black";
                else 
                    $class = "white";
                $html .= "<div id=\"$position\" class=\"$class\">";
                if(isset($this->board[$position]))
                    $html .= $this->board[$position]->getHtml();
                $html .= "</div>";
                    }
                }
                $html .= "</div>";
                return $html;
            }
}
?>