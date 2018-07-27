<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Enam_ctrl';
$route['404_override'] = 'Url_ctrl/index';
$route['translate_uri_dashes'] = FALSE;

$route['elearning'] = 'Elearning_ctrl';
$route['elearning/(:any)'] = 'Elearning_ctrl/index/$1';
//$route['elearning/(:num)/krimtel/(:num)/rahul/vivek'] = 'Elearning_ctrl/video_detail/$1/';
$route['elearning/id/(:num)'] = 'Elearning_ctrl/video_detail/$1';
$route['nam/(:any)'] = 'Enam_ctrl/$1';
$route['layout_page/(:any)'] = 'Enam_ctrl/$1';

////////////////////admin/////////

$route['admin/admin'] = 'admin/Auth/index';
$route['admin/admin/menus'] = 'admin/Menu_ctrl';
$route['admin/admin/menus/(:any)'] = 'admin/Menu_ctrl/index/$1';
$route['admin/admin/dashboard'] = 'admin/Admin_ctrl/dashboard';
$route['admin/admin/language'] = 'admin/Language_ctrl/index';
$route['admin/admin/video']='admin/Video_ctrl/video_cat';
$route['admin/admin/videos']='admin/Video_ctrl/index';
$route['admin/admin/users'] = 'admin/Users_ctrl/index';
$route['admin/admin/widgets'] = 'admin/Widget_ctrl/index';
$route['admin/admin/news'] = 'admin/News_ctrl/index';
$route['admin/admin/links'] = 'admin/Links_ctrl/index';
$route['admin/admin/events'] = 'admin/Event_ctrl/index';
$route['admin/admin/slider'] = 'admin/Slider_ctrl/index';
$route['admin/admin/Static_pages'] = 'admin/Static_ctrl/index';
$route['admin/admin/add_page'] = 'admin/Page_ctrl/index';
$route['admin/admin/add_page/(:num)'] = 'admin/Page_ctrl/index/$1';
$route['admin/admin/all_pages'] = 'admin/Page_ctrl/all_pages';
$route['admin/admin/cache_mgnt'] = 'admin/Cache_ctrl/index';
$route['admin/admin/lang_file'] = 'admin/Lang_ctrl/index';
$route['admin/admin/notification'] = 'admin/Notification_ctrl/admin_notification';
$route['admin/admin/user_profile_update'] = 'admin/user_profile/profile';
$route['admin/admin/profile_update'] = 'admin/user_profile/profile';
$route['admin/admin/change_password'] = 'admin/user_profile/change_password';
$route['admin/admin/(:any)'] = 'admin/Admin_ctrl/$1';


$route['admin/admin/edit_page'] = 'admin/Admin_ctrl/$1';
$route['admin/admin/home_page'] = 'admin/Admin_ctrl/$1';
