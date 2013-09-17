<?php
function counter_core() {
    $target = "https://onepiece.nchu.edu.tw/cofsys/plsql/crseqry_home";
        
    $input_name['v_year']   = $_POST['v_year'];
    $input_name['v_career'] = $_POST['v_career'];
    $input_name['v_dept']   = $_POST['v_dept'];
    $input_name['v_level']  = '';

    $level_f = ($_POST['v_level_f'] != '') ? $_POST['v_level_f'] : 1;
    $level_t = ($_POST['v_level_t'] != '') ? $_POST['v_level_f'] : 4;

    $class_arr = array();

    for ($i=$level_f; $i <= $level_t; $i++) { 
        $input_name['v_level']  = $i;
        $class_arr =  array_merge($class_arr, parse($target, $input_name)); 
    }

    $counter = array();
    for ($i=1; $i <6 ; $i++) { 
        for ($j=1; $j <10 ; $j++) { 
            $counter[$i][$j] = 0;
        }
    }

    foreach ($class_arr as $key => $value) {
        $c_time = $value['c_time'];

        if ( substr_count($c_time, ",") > 0 ) {
            $c_time = explode(',',$c_time);
        }
        else {
            $c_time = array($c_time);
        }
        
        foreach ($c_time as $key2 => $value2) {

            $week_day = substr($value2, 0, 1);
            $class_time = str_split( substr($value2, 1), 1);

            foreach ($class_time as $key3 => $value3) {
                $counter[$week_day][$value3] ++;
            }
        }
        
    }

    echo <<<_EOF
    <h2>NCHU Open Data: 課程時段一周比較表</h2>
        <table class="table table-bordered class_table">
            <thead>
                <tr>
                    <td>星/節</td>
                    <td>Mon.</td>
                    <td>Tue.</td>
                    <td>Wed.</td>
                    <td>Thu.</td>
                    <td>Fri.</td>
                </tr>
            </thead>
            <tbody>
_EOF;

    for ($i=1; $i <= 9; $i++) { 

        echo "<tr>";
        echo "<td>$i</td>";

        for ($j=1; $j < 6; $j++) {

            if ( $counter[$j][$i] == 0 ) {
                $td_class = "blue";
            }
            elseif ( $counter[$j][$i] == 1 ) {
                $td_class = "green";
            }
            elseif ( $counter[$j][$i] == 2 ) {
                $td_class = "yellow";
            }
            elseif ( $counter[$j][$i] >= 3 ) {
                $td_class = "red";
            }
            else {
                $td_class = "";
            }

            echo "<td class=\"$td_class\">" . $counter[$j][$i] . "</td>";
        }

        echo "</tr>";
    }


    echo "</tbody>\n</table> ";
}