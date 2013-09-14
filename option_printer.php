<?php 
print_yaer("0951", "0982");

function print_yaer($from, $to) {    
    $diff       = $to - $from;
    $year_diff  = floor($diff / 10);
    $seme_diff  = $diff % 10;
    $fixed_val  = get_fixed_value($seme_diff);
    $number     = ($year_diff + 1) * 2 + $fixed_val ;
    $arr_opt    = array();
    $y = floor($from / 10);
    $s = $from % 10;

    for ($i=0; $i < $number; $i++) { 
        $arr_opt[] = $y . $s;

        if ($s == 2) {
            $y++;
            $s = 1;
        }
        else {
            $s++;
        }
    }

    foreach ($arr_opt as $key => $value) {
        echo "<option value=\"$value\">$value</option>\n";
    }
}

function get_fixed_value($seme_diff)
{
    switch ($seme_diff) {
        case '0':
            return -1;
        case '0':
            return -1;            
        case '9':
            return  0;
        default:
            return  0;
    }    
}