<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['employee'] = 'employee/index';
$route['reports'] = 'reports/index';
$route['settings'] = 'settings/index';
$route['after_hour'] = 'after_hour/index';
$route['admin'] = 'admin/index';
$route['laptop'] = 'laptop/index';
$route['visitor'] = 'visitor/index';
$route['(:any)'] = 'admin/$1';
$route['default_controller'] = 'Auth/index';
$route['404_override'] = '';
$route['(:any)'] = 'pages/view/$1';

$route['(:any)'] = 'reports/$1';
$route['(:any)'] = 'after_hour/$1';
$route['(:any)'] = 'settings/$1';
$route['(:any)'] = 'laptop/$1';
$route['(:any)'] = 'visitor/$1';
$route['(:any)'] = 'dashboard/index/$1';
$route['translate_uri_dashes'] = FALSE;
