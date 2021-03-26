<?php

function getComponentPath($name) {
    return get_template_directory() . "/Components/$name/$name.php";
}