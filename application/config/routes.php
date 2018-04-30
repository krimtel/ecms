<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Enam_ctrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['nam/(:any)'] = 'Enam_ctrl/$1';
// $route['farmer/(:any)'] = 'Enam_ctrl/$1';
// $route['trader/(:any)'] = 'Enam_ctrl/$1';
// $route['statistics/(:any)'] = 'Enam_ctrl/$1';
// $route['elarning/(:any)'] = 'Enam_ctrl/$1';
// $route['contactus/(:any)'] = 'Enam_ctrl/$1';
// $route['logistic/(:any)'] = 'Enam_ctrl/$1';
// $route['training/(:any)'] = 'Enam_ctrl/$1';

////////////////////admin/////////

$route['admin/admin'] = 'admin/Auth/index';
$route['admin/admin/menus'] = 'admin/Menu_ctrl';
$route['admin/admin/menus/(:any)'] = 'admin/Menu_ctrl/index/$1';
$route['admin/admin/dashboard'] = 'admin/Admin_ctrl/dashboard';
$route['admin/admin/(:any)'] = 'admin/Admin_ctrl/$1';