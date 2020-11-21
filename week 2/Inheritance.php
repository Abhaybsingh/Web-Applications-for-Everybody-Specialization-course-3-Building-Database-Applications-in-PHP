<?php
class Hello {
    protected $lang;
    function __construct($lang) {
        $this -> lang =$lang;
    }
    function greet() {
        if ( $this -> lang == 'fr' ) return 'Bonjour';
        if ( $this -> lang == 'es' ) return 'Hola';
        return 'Hello';
    }
    function __destruct() {
        echo("Destructed");
        echo("<br>");
    }
}

class Social extends Hello {
    function bye() {
        if ( $this -> lang == 'fr' ) return 'Av revoir';
        if ( $this -> lang == 'es' ) return 'Adios';
        return 'goodbye';
    }
}

echo("=====Hello====");
echo("<br>");
$hi = new Hello('es');
echo("<br>");
echo $hi -> greet();
echo("<br>");

echo("=====Social====");
echo("<br>");
$hi2 = new Social('es');
echo("<br>");
echo $hi2 -> greet();
echo("<br>");
echo $hi2 -> bye();
echo("<br>");

class MyClass {
    public $pub = "Public";
    protected $pro = "Protected";
    private $priv = "Private";

    function printHello() {
        echo( $this -> pub );
        echo("<br>");
        echo( $this -> pro );
        echo("<br>");
        echo( $this -> priv );
        echo("<br>");
    }
}

echo("=====MyClass====");
echo("<br>");
$obj = new MyClass();
echo("<br>");
echo( $obj -> pub );
echo("<br>");
// echo( $obj -> pro );
echo("<br>");
// echo( $obj -> priv );
echo("<br>");
$obj -> printHello();
echo("<br>");


class MyClass2 extends MyClass {

    function printHello() {
        echo( $this -> pub );
        echo("<br>");
        echo( $this -> pro );
        echo("<br>");
        // echo( $this -> priv );
        // echo("<br>");
    }
}

echo("=====MyClass2====");
echo("<br>");
$obj = new MyClass2();
echo("<br>");
echo( $obj -> pub );
echo("<br>");
// echo( $obj -> pro );
echo("<br>");
// echo( $obj -> priv );
echo("<br>");
$obj -> printHello();
echo("<br>");


echo("=====stdClass====");
echo("<br>");
$player = new stdClass();

$player -> name = "Chuck";
$player -> score = 0;

$player -> score++;

print_r($player);
echo("<br>");

class Player {
    public $name = "Sally";
    public $score = 0;
}

$p2 = new Player();
$p2 -> score++;
print_r($p2);
echo("<br>");
echo("<br>");
?>