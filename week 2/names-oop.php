<!-- oop -->
<?php
class Person {
    public $fullname = false;
    public $room = false;
    public $familyname = false;
    public $givename = false;

    function get_name() {
        if ( $this -> fullname !== false ) return $this -> fullname;
        if ( $this -> familyname !== false && $this -> givename !== false) {
            return $this -> givename. " " . $this -> familyname;
        }
        return false;
    }
}

$chuck = new Person();
$chuck -> fullname = "Chuck Severance";
$chuck -> room = '4429NQ';

$colleen = new Person();
$colleen -> familyname = "van Lent";
$colleen -> givename = 'Colleen';
$colleen -> room = '3439NQ';

print $chuck -> get_name();
echo "<br>";
print $colleen -> get_name($colleen)."\n";
echo "<br>";
print_r($chuck);
echo "<br>";
print_r($colleen);