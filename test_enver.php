<?php


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
