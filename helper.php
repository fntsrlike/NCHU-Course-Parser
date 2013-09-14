<?php


function parse ($target_url, $argu, $type = 'key') {

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
    

    # Get CLASS html string
    $table = return_between($str, '班別:', '</TABLE>', EXCL);
    $table = str_ireplace('</strong>', '', $table);
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

        $class[] = $type == 'key' ? $array_key : $array_no;
    }

    return $class;
}


function year_opt_printer($from, $to) {    
    $diff       = $to - $from;
    $year_diff  = floor($diff / 10);
    $seme_diff  = $diff % 10;
    $fixed_val  = get_fixed_value($seme_diff);
    $number     = ($year_diff + 1) * 2 + $fixed_val ;
    $arr_opt    = array();
    $y = floor($from / 10);
    $s = $from % 10;

    for ($i=0; $i < $number; $i++) { 
        $y = $y < 100 ? '0'.$y : $y;
        $arr_opt[] = $y . $s;
        $y = (int) $y;
        
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

function dept_opt_printer() {
    echo <<<_EOF
        </option><option value="C20">C20 管理學院
        </option><option value="U11">U11 中國文學系學士班
        </option><option value="U12">U12 外國語文學系學士班
        </option><option value="U13">U13 歷史學系學士班
        </option><option value="U21">U21 財務金融學系學士班
        </option><option value="U23">U23 企業管理學系學士班
        </option><option value="U24">U24 法律學系學士班
        </option><option value="U28">U28 會計學系學士班
        </option><option value="U29">U29 資訊管理學系學士班
        </option><option value="U30G">U30G 生物科技學程學士學位學程
        </option><option value="U30H">U30H 國際農企業學士學位學程
        </option><option value="U30F">U30F 景觀與遊憩學程學士學位學程
        </option><option value="U31">U31 農藝學系學士班
        </option><option value="U32">U32 園藝學系學士班
        </option><option value="U33B">U33B 森林學系木材科學組學士班
        </option><option value="U33A">U33A 森林學系林學組學士班
        </option><option value="U34">U34 應用經濟學系學士班
        </option><option value="U35">U35 植物病理學系學士班
        </option><option value="U36">U36 昆蟲學系學士班
        </option><option value="U37">U37 動物科學系學士班
        </option><option value="U38A">U38A 獸醫學系學士班
        </option><option value="U38B">U38B 獸醫學系學士班
        </option><option value="U39">U39 土壤環境科學系學士班
        </option><option value="U40">U40 生物產業機電工程學系學士班
        </option><option value="U42">U42 水土保持學系學士班
        </option><option value="U43">U43 食品暨應用生物科技學系學士班
        </option><option value="U44">U44 行銷學系學士班
        </option><option value="U51">U51 化學系學士班
        </option><option value="U52">U52 生命科學系學士班
        </option><option value="U53A">U53A 應用數學系學士班
        </option><option value="U53B">U53B 應用數學系學士班
        </option><option value="U54A">U54A 物理學系一般物理組學士班
        </option><option value="U54B">U54B 物理學系光電物理組學士班
        </option><option value="U56">U56 資訊科學與工程學系學士班
        </option><option value="U60F">U60F 學士後太陽能光電系統應用學程學士學位學程
        </option><option value="U61B">U61B 機械工程學系學士班
        </option><option value="U61A">U61A 機械工程學系學士班
        </option><option value="U62B">U62B 土木工程學系學士班
        </option><option value="U62A">U62A 土木工程學系學士班
        </option><option value="U63">U63 環境工程學系學士班
        </option><option value="U64B">U64B 電機工程學系學士班
        </option><option value="U64A">U64A 電機工程學系學士班
        </option><option value="U65">U65 化學工程學系學士班
        </option><option value="U66">U66 材料科學與工程學系學士班
_EOF;
}

function grade_opt_printer() {
    echo <<<_EOF
    <option value="">
    </option><option value="1">一年級
    </option><option value="2">二年級
    </option><option value="3">三年級
    </option><option value="4">四年級
    </option><option value="5">五年級
    </option>
_EOF;
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

function get_header() {

    $header_array = array();
    $header_array['type'] = '必選別';
    $header_array['no'] = '選課號碼';
    $header_array['ch_name'] = '科目名稱';
    $header_array['en_name'] = '科目名稱';
    $header_array['pre'] = '先修科目';
    $header_array['period'] = '全/半年';
    $header_array['credit'] = '學分數';
    $header_array['c_hour'] = '上課時數';
    $header_array['p_hour'] = '實習時數';
    $header_array['c_time'] = '上課時間';
    $header_array['p_time'] = '實習時間';
    $header_array['c_room'] = '上課教室';
    $header_array['p_room'] = '實習教室';
    $header_array['c_teacher'] = '上課教師';
    $header_array['p_teacher'] = '實習教師';
    $header_array['unit'] = '開課單位';
    $header_array['people'] = '開課人數';
    $header_array['other_people'] = '外系人數';
    $header_array['remaining'] = '可加選餘額';
    $header_array['lang'] = '語言';
    $header_array['remark'] = '備註';

    return $header_array;
}
