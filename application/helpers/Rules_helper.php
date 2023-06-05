<?php

function rupiah($data)
{
    $rupiah = "Rp ".number_format($data,2,',','.');
    return $rupiah;
}

?>