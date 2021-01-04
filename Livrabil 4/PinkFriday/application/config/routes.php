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
$route['default_controller'] = 'mainpagecontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['product/(:any)'] = 'productpagecontroller/display/$1';
$route['searches/(:any)'] = 'searchcontroller/searchbyfilter/$1';
$route['searches/(:any)/discount'] = 'searchcontroller/searchbyfilter/$1/discount';
$route['searches/(:any)/nodiscount/(:any)'] = 'searchcontroller/searchbyfilter/$1/nodiscount/$2';
$route['searches/(:any)/nodiscount'] = 'searchcontroller/searchbyfilter/$1/nodiscount';
$route['searches/(:any)/discount/(:any)'] = 'searchcontroller/searchbyfilter/$1/discount/$2';
$route['searches'] = 'searchcontroller';
$route['signin'] = 'signcontroller/signin';
$route['signup'] = 'signcontroller/signup';
$route['logout'] = 'profilepagecontroller/logout';
$route['add'] = 'cartcontroller/add';
$route['subtract'] = 'cartcontroller/subtract';
$route['remove'] = 'cartcontroller/remove';
$route['insert/(:any)'] = 'cartcontroller/insert/$1';
$route['saveedit'] = 'profilepagecontroller/saveEdit';
$route['adminadd'] = 'adminaddcontroller'; 
$route['adminview'] = 'adminviewcontroller'; 
$route['adding'] = 'addingcontroller'; 

$route['csv']['POST'] = 'adminviewcontroller/csv';

$route['item']['POST'] = 'restapi/createItem';
$route['item']['GET'] = 'restapi/getItems';

$route['order']['POST'] = 'restapi/createOrder';

$route['cart/(:any)']['GET'] = 'restapi/getCart/$1';
$route['cart/(:any)']['DELETE'] = 'restapi/deleteCart/$1';
