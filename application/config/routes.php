<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['blog'] = 'welcome/blog';
$route['login'] = 'welcome/login';
$route['register'] = 'welcome/register';

$route['dashboard_sadmin'] = 'dashboard_sadmin/index';
$route['lists'] = 'dashboard_sadmin/school/lists';
$route['teacher'] = 'dashboard_sadmin/teacher';
$route['supschool'] = 'dashboard_sadmin/school';
$route['total_teacher'] = 'dashboard_sadmin/total_teacher';
$route['classes'] = 'dashboard_sadmin/classes';
$route['total_class'] = 'dashboard_sadmin/total_class';
$route['student'] = 'dashboard_sadmin/student';
$route['total_student'] = 'dashboard_sadmin/total_student';
$route['home'] = 'Teacher';

$route['home/title'] = 'Teacher/title';
$route['home/objective'] = 'Teacher/objective';
$route['home/view_student'] = 'Teacher/view_student';

$route['dashbaord'] = 'dashbaord/index';
$route['school'] = 'dashbaord/school';
$route['teacher'] = 'dashbaord/teacher';
$route['users'] = 'Users/add_user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
