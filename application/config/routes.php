<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['dashboard'] = 'Pages/dashboard';
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['items'] = 'pages/items';
$route['categories'] = 'pages/category';
$route['contact-message'] = 'pages/contactMessage';
$route['home-page-image'] = 'pages/home_page';
$route['orders'] = 'pages/orders';
$route['gallery'] = 'pages/gallery';
$route['location'] = 'pages/location';
$route['partners'] = 'pages/partners';
$route['visitors-list'] = 'pages/visitors';
$route['new-admin'] = 'pages/system_users_list';
$route['new-items'] = 'item/addNewItem';
$route['edit-item/(:any)'] = 'item/editItem/$1';
$route['login'] = 'pages/login';
$route['logout'] = 'Auth/logout';