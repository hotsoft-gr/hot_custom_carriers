<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/
//use Tygh\Registry;
//use Tygh\Storage;
use Tygh\Languages\Languages;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_hot_custom_carriers_install(){
	$acs_id = db_get_field("SELECT service_id FROM ?:shipping_services
						 WHERE code='acs_hot' LIMIT 1");
	$data_acs_descr=array(
		'service_id'=>$acs_id,
		'description'=>'ACS Courier',
		'lang_code'=>CART_LANGUAGE
	);

	foreach (Languages::getAll() as $lang) { // insert for all languages
		$data_acs_descr['lang_code']=$lang["lang_code"];
		$insert_speedex_id = db_query("REPLACE INTO ?:shipping_service_descriptions ?e", $data_acs_descr);
	}

    $speedex_id = db_get_field("SELECT service_id FROM ?:shipping_services
    WHERE code='speedex_hot' LIMIT 1");
    
    $speedex_descr=array(
        'service_id'=>$speedex_id,
        'description'=>'SPEEDEX Courier',
        'lang_code'=>CART_LANGUAGE
    );

	foreach (Languages::getAll() as $lang) { // insert for all languages
		$speedex_descr['lang_code']=$lang["lang_code"];
		$insert_speedex_id = db_query("REPLACE INTO ?:shipping_service_descriptions ?e", $speedex_descr);
	}
    

	$gt_id = db_get_field("SELECT service_id FROM ?:shipping_services
    WHERE code='gt_hot' LIMIT 1");
    
    $gt_descr=array(
        'service_id'=>$gt_id,
        'description'=>'Γενική Ταχυδρομική',
        'lang_code'=>CART_LANGUAGE
    );

	foreach (Languages::getAll() as $lang) { // insert for all languages
		$gt_descr['lang_code']=$lang["lang_code"];
		$insert_gt_id = db_query("REPLACE INTO ?:shipping_service_descriptions ?e", $gt_descr);
	}

	$elt_id = db_get_field("SELECT service_id FROM ?:shipping_services
    WHERE code='elt_hot' LIMIT 1");
    
    $elt_descr=array(
        'service_id'=>$elt_id,
        'description'=>'ΕΛΤΑ',
        'lang_code'=>CART_LANGUAGE
    );

	foreach (Languages::getAll() as $lang) { // insert for all languages
		$elt_descr['lang_code']=$lang["lang_code"];
		$insert_elt_id = db_query("REPLACE INTO ?:shipping_service_descriptions ?e", $elt_descr);
	}

	return true;
}

function fn_hot_custom_carriers_uninstall(){
	$acs_id = db_get_field("SELECT service_id FROM ?:shipping_services WHERE code='acs_hot' LIMIT 1");	
	db_query("DELETE FROM ?:shipping_service_descriptions WHERE service_id=?i", $acs_id);
	db_query("DELETE FROM ?:shipping_services WHERE service_id=?i", $acs_id);
	
	$speedex_id = db_get_field("SELECT service_id FROM ?:shipping_services WHERE code='speedex_hot' LIMIT 1");
    db_query("DELETE FROM ?:shipping_service_descriptions WHERE service_id=?i", $speedex_id);
    db_query("DELETE FROM ?:shipping_services WHERE service_id=?i", $speedex_id);

	$gt_id = db_get_field("SELECT service_id FROM ?:shipping_services WHERE code='gt_hot' LIMIT 1");
    db_query("DELETE FROM ?:shipping_service_descriptions WHERE service_id=?i", $gt_id);
    db_query("DELETE FROM ?:shipping_services WHERE service_id=?i", $gt_id);

	$elt_id = db_get_field("SELECT service_id FROM ?:shipping_services WHERE code='elt_hot' LIMIT 1");
    db_query("DELETE FROM ?:shipping_service_descriptions WHERE service_id=?i", $elt_id);
    db_query("DELETE FROM ?:shipping_services WHERE service_id=?i", $elt_id);

	return true;
}