<?php
date_default_timezone_set('America/New_York');

$nextWeek = time() + (7 * 24 * 60 * 60);
echo 'Now:      '. date('Y-m-d');
echo '<br>';
echo 'Next Week '. date('Y-m-d', $nextWeek);
echo '<br>';
echo '=====';
echo '<br>';
$now = new DateTime();
$nextWeek = new DateTime('today +1 week');
echo 'Now:      '. $now -> format('Y-m-d')."\n";
echo '<br>';
echo 'Next Week '. $nextWeek -> format('Y-m-d')."\n";

