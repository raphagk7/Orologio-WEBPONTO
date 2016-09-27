<?php
$datetime1 = new DateTime('10:00');
$datetime2 = new DateTime('14:30');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%H.%i');

$tz_object = new DateTimeZone('Brazil/East');
//date_default_timezone_set('Brazil/East');

$datetime = new DateTime();
$datetime->setTimezone($tz_object);
echo "<br>".$datetime->format('H:i');
echo "<br>".$datetime->format('Y-m-d');
?>