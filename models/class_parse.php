<?php
function class_parse ($class_type, $argu, $output_type = 'key') {

    switch ($class_type) {
        case 'normal':
        default:
            $target_url = "https://onepiece.nchu.edu.tw/cofsys/plsql/crseqry_home";
            break;
        case 'liberal':
            $target_url = "https://onepiece.nchu.edu.tw/cofsys/plsql/crseqry_gene";
            break;
    }

    $header_array = get_header();

    $get_string = '';

    # Get Url    
    foreach ($argu as $key => $value) {
        $get_string .= "$key=$value&";
    }
    $url = $target_url . '?' . $get_string;
    
    # Get html string
    $str = '';
    $file_handle = fopen($url, "r");
    while (!feof($file_handle)) {
        $str .= fgets($file_handle, 4096);
    }
    fclose($file_handle);

    if ($class_type == 'normal') {
        # Get CLASS html string
        $table = return_between($str, '班別:', '</TABLE>', EXCL);
        $table = str_ireplace('</strong>', '', $table);    

    }
    elseif ($class_type == 'liberal') {
        $tmp = '<TABLE  border=1 width="1040"  cellspacing="0" cellpadding="0" class="word_13">';
        $table = return_between($str, $tmp, '</TABLE>', EXCL);
        $table = str_ireplace('</strong>', '', $table);    
    }

    //echo $table;
    
    # Turn content to a class per unit
    $table = str_ireplace('<TR>', '</TR><TR>', $table);    
    $per_cless = parse_array($table, '<TR>', '</TR>');
    $class = array();

    # Turn class to array
    foreach ($per_cless as $c_key => $c_value) {
        $tmp = return_between($c_value, '<TR>', '</TR>', EXCL);
        $per_element = parse_array($tmp, '>', '</TD>');

        $array_no = '';
        foreach ($per_element as $e_key => $e_value) {
            $tmp2 = return_between($e_value, '>', '</TD>', EXCL);
            
            if ($e_key == 1) {
                $tmp2 = return_between($e_value, '">', '</a>', EXCL);
            }

            if ($e_key == 2) {
                $tmp2 = explode('</BR>', $tmp2);
                $array_no[] = $tmp2[0];
                $array_no[] = $tmp2[1];
            }
            else {
                $array_no[] = $tmp2;    
            }

            
        }

        $sort = 0;
        $array_key = array();
        foreach ($header_array as $key => $value) {
            $array_key[$key] = $array_no[$sort];
            $sort++;
        }

        $class[] = $output_type == 'key' ? $array_key : $array_no;
    }

    return $class;
}
