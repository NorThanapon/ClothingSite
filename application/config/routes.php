<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['admin'] = "admin/order";
$route['404_override'] = '';

//size chart
$route['brand/size_chart/([-_a-zA-Z0-9]+)/(:num)/(:num)'] = 'sizechart/index/$1/$2/$3';

// brand
$route['brand/([-_a-zA-Z0-9]+)/(:num)/(:num)'] = 'ajax/index/$1/$2/$3';
$route['brand/([-_a-zA-Z0-9]+)/(:num)'] = 'brand/product/$1/$2';
$route['brand/([-_a-zA-Z0-9]+)'] = 'brand/product/$1';

$route['brand/(:any)/page/(:num)/(:num)'] = 'brand/product_list/$1/$2/$3';
$route['brand/(:any)/page/(:num)'] = 'brand/product_list/$1/$2';
$route['brand/(:any)'] = 'brand/product_list/$1';

//category
$route['category/([-_a-zA-Z0-9]+)/([-_a-zA-Z0-9]+)/(:num)/(:num)/(:num)'] = 'category/product/$1/$2/$3/$4/$5';
$route['category/([-_a-zA-Z0-9]+)/([-_a-zA-Z0-9]+)/(:num)/(:num)'] = 'category/product/$1/$2/$3/$4';
$route['category/([-_a-zA-Z0-9]+)/([-_a-zA-Z0-9]+)/(:num)'] = 'category/product/$1/$2/$3';

$route['category/(:any)/(:any)/(:num)/page/(:num)/(:num)'] = 'category/product_list/$1/$2/$3/$4/$5';
$route['category/(:any)/(:any)/(:num)/page/(:num)'] = 'category/product_list/$1/$2/$3/$4';
$route['category/(:any)/(:any)/(:num)'] = 'category/product_list/$1/$2/$3';

//tag
$route['tag/([-_a-zA-Z0-9]+)/(:num)'] = 'tag/index/$1/$2';
$route['tag/([-_a-zA-Z0-9]+)/(:num)/(:num)'] = 'tag/product_detail/$1/$2/$3';

//search
$route['search/(:any)'] = 'search/product/$1';
$route['search/(:any)/page/(:num)/(:num)'] = 'search/product_list/$1/$2/$3'; 
$route['search/ (:any)/(:num)'] = 'search/product_list/$1';



/* End of file routes.php */
/* Location: ./application/config/routes.php */?>