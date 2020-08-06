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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/favorit/add'] = 'api/favorit/add';
$route['api/favorit/getalldokter'] = 'api/favorit/getalldokter';
$route['api/favorit/getall'] = 'api/favorit/getall';
$route['api/favorit/getone'] = 'api/favorit/getone';
$route['api/favorit/update'] = 'api/favorit/update';
$route['api/favorit/delete'] = 'api/favorit/delete'; 

$route['api/konsultasi/add'] = 'api/konsultasi/add';
$route['api/konsultasi/getalldokter'] = 'api/konsultasi/getalldokter';
$route['api/konsultasi/getall'] = 'api/konsultasi/getall';
$route['api/konsultasi/getone'] = 'api/konsultasi/getone';
$route['api/konsultasi/update'] = 'api/konsultasi/update';
$route['api/konsultasi/delete'] = 'api/konsultasi/delete'; 

$route['api/logbutawarna/add'] = 'api/logbutawarna/add';
$route['api/logbutawarna/getall'] = 'api/logbutawarna/getall';
$route['api/logbutawarna/getone'] = 'api/logbutawarna/getone';
$route['api/logbutawarna/update'] = 'api/logbutawarna/update';
$route['api/logbutawarna/delete'] = 'api/logbutawarna/delete'; 

$route['api/logkatarak/add'] = 'api/logkatarak/add';
$route['api/logkatarak/getall'] = 'api/logkatarak/getall';
$route['api/logkatarak/getone'] = 'api/logkatarak/getone';
$route['api/logkatarak/update'] = 'api/logkatarak/update';
$route['api/logkatarak/delete'] = 'api/logkatarak/delete'; 

$route['api/logminus/add'] = 'api/logminus/add';
$route['api/logminus/getall'] = 'api/logminus/getall';
$route['api/logminus/getone'] = 'api/logminus/getone';
$route['api/logminus/update'] = 'api/logminus/update';
$route['api/logminus/delete'] = 'api/logminus/delete'; 

$route['api/logpterigium/add'] = 'api/logpterigium/add';
$route['api/logpterigium/getall'] = 'api/logpterigium/getall';
$route['api/logpterigium/getone'] = 'api/logpterigium/getone';
$route['api/logpterigium/update'] = 'api/logpterigium/update';
$route['api/logpterigium/delete'] = 'api/logpterigium/delete'; 

$route['api/member/dokter'] = 'api/member/dokter';
$route['api/member/login'] = 'api/member/login';
$route['api/member/add'] = 'api/member/add';
$route['api/member/getall'] = 'api/member/getall';
$route['api/member/getone'] = 'api/member/getone';
$route['api/member/update'] = 'api/member/update';
$route['api/member/delete'] = 'api/member/delete'; 

$route['api/notifikasi/add'] = 'api/notifikasi/add';
$route['api/notifikasi/getall'] = 'api/notifikasi/getall';
$route['api/notifikasi/getone'] = 'api/notifikasi/getone';
$route['api/notifikasi/update'] = 'api/notifikasi/update';
$route['api/notifikasi/delete'] = 'api/notifikasi/delete'; 

$route['api/review/add'] = 'api/review/add';
$route['api/review/getalldokter'] = 'api/review/getalldokter';
$route['api/review/getall'] = 'api/review/getall';
$route['api/review/getone'] = 'api/review/getone';
$route['api/review/update'] = 'api/review/update';
$route['api/review/delete'] = 'api/review/delete'; 
