<?php

function dd($parameter) {
    echo "<pre>";
    var_dump($parameter);
    echo "</pre>";
    die;
}