<?php

// This sets the version of the module.
// Note that the version follows sql.
//
// If we wanted to update our SQL at a later point
// we will add a fill to the 'up' dir where we place a
// e.g. 1.02.sql file and update $_INSTALL['VERSION] as well.
$_INSTALL['VERSION'] = 2.52;
$_INSTALL['PUBLIC_CLONE_URL'] = "git://github.com/diversen/contact.git";
$_INSTALL['PRIVATE_CLONE_URL'] = 'git@github.com:diversen/contact.git';

// This creates a main menu item in the database
$_INSTALL['MAIN_MENU_ITEM'] = array (
    'title' => lang::translate('Contact', null ,array ('no_translate' => true)),
    'url' => '/contact/index',
    'module_name' => 'contact',
    'parent' => 0,
    'weight' => 2,
    'auth' => 'user'
);
