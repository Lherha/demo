<?php
 $startYear = 2006;
 $thisYear = date('Y');
 if ($startYear == $thisYear) {
 echo $startYear;
 } else {
 echo "{$startYear}&#8211;{$thisYear}";
 }
 ?>