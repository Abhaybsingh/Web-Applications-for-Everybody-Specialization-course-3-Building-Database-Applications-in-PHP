<!-- non oop -->
<?php
$chuck = array("fullname" => "Chuck Severance", "room" => '4429NQ');
$colleen = array("familyname" => "van Lent", 'givename' => 'Colleen',"room" => '3439NQ');

function get_person_name($person) {
    if (isset($person['fullname'])) return $person['fullname'];
    if (isset($person['familyname']) && isset($person['givename'])) {
        return $person['givename'].' '.$person['familyname'];
    }
    return false;
}

print get_person_name($chuck);
echo "<br>";
print get_person_name($colleen)."\n";
echo "<br>";

