<?php

function get_header($version) {
    require "inc/body/{$version}.php";
}

function get_footer() {
    require 'inc/footer.php';
}

function get_header_body() {
    require 'inc/header.php';
}