<?php

    echo $date = date('Y-m-d');
    echo "<br>";
    echo $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
    echo "<br>";
    echo $friday = date( 'Y-m-d', strtotime( 'friday this week' ) );
    echo "<br>";
    echo $display = date('M d, Y', strtotime($date));
    echo "<br>";
    echo $week = date( 'M d, Y', strtotime( 'monday this week' ) ).' - '.date( 'M d, Y', strtotime( 'friday this week' ) );

?>