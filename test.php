<?php

$from   = (int) "0951";
$to     = (int) "0962";

$diff       = $to - $from;
$year_diff  = floor($diff / 10);
$seme_diff  = $diff % 10;
$fixed_val  = get_fixed_value($seme_diff);
$number     = ($year_diff + 1) * 2 + $fixed_val ;

for ($i=0; $i<$number; $i++) {

}


echo '<pre>';
pt(var_name ($from, get_defined_vars()), $from);
pt(var_name ($to, get_defined_vars()), $to);
pt(var_name ($diff, get_defined_vars()), $diff);
pt(var_name ($year_diff, get_defined_vars()), $year_diff);
pt(var_name ($seme_diff, get_defined_vars()), $seme_diff);
pt(var_name ($fixed_val, get_defined_vars()), $fixed_val);
pt(var_name ($number, get_defined_vars()), $number);



function pt($var_name, $var)
{
    echo "$var_name = $var <br/>";
}

function var_name (&$iVar, &$aDefinedVars)
{
    
    foreach ($aDefinedVars as $k=>$v)
        $aDefinedVars_0[$k] = $v;

    $iVarSave = $iVar;
    $iVar     =!$iVar;

    $aDiffKeys = array_keys (array_diff_assoc ($aDefinedVars_0, $aDefinedVars));
    $iVar      = $iVarSave;

    return $aDiffKeys[0];
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