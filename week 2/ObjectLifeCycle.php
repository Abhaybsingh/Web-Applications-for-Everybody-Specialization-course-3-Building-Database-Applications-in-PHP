<?php
class PartyAnimal {
    function __construct() {
        echo("Constructed");
        echo("<br>");
    }
    function something() {
        echo("Something");
        echo("<br>");
    }
    function __destruct() {
        echo("Destructed");
        echo("<br>");
    }
}

echo("--One");
echo("<br>");
$x = new PartyAnimal();
echo("<br>");
echo("--Two");
echo("<br>");
$y = new PartyAnimal();
echo("<br>");
echo("--Three");
echo("<br>");
$x -> something();
echo("<br>");
echo("--The end?");
echo("<br>");

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

$hi = new Hello('es');
echo("<br>");
echo $hi -> greet();
echo("<br>");
?>