<?php

use Phalcon\Filter;

$filter = new Filter();

/*
 *  Users Filters
 */
$filter->add('login', function ($value) {
    return preg_replace('/[^0-9a-fA-Z]/', '', $value);
});

// 8 chars min, any type, any order
$filter->add('pwd', function ($value) {
    return preg_replace('/([a-zA-Z0-9.*!?_-]){8,}\w+/', '', $value);
});

$filter->add('email', function ($value) {
    return preg_replace('/[^0-9a-f]/', '', $value);
});

$filter->add('phone', function ($value) {
    return preg_replace('/[^0-9a-f]/', '', $value);
});

$filter->add('team', function ($value) {
    return preg_replace('/[^0-9a-f]/', '', $value);
});