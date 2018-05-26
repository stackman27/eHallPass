<?php 
function cleansearch($clean){
        $filter = preg_replace("/\r\n|\r|\n/", '<br/>', $clean);
        $filter = preg_replace("~\x{00a0}~siu", " ", $filter);
        $filter = preg_replace("/&nbsp;/", '', $filter);

        return $filter;
    }

?>