<?php
/***************************************************************************
 *                                                                          *
 *  (c) 2018 powerES            *
 ****************************************************************************/

namespace Tygh\Shippings\Services;

use Tygh\Shippings\IService;

/**
 * UPS shipping service
 */
class Gt implements IService
{
    
    /**
     * Checks if shipping service allows to use multithreading
     *
     * @return bool true if allow
     */
    public function allowMultithreading()
    {
        return $this->_allow_multithreading;
    }

    /**
     * Sets data to internal class variable
     *
     * @param array $shipping_info
     */
    public function prepareData($shipping_info)
    {
        $this->_shipping_info = $shipping_info;
    }

     /**
     * Gets shipping cost and information about possible errors
     *
     * @param  string $resonse Reponse from Shipping service server
     * @return array  Shipping cost and errors
     */
    public function processResponse($response)
    {
        return $response;
    }

    /**
     * Gets error message from shipping service server
     *
     * @param  string $resonse Reponse from Shipping service server
     * @return string Text of error or false if no errors
     */
    public function processErrors($response)
    {
        return null;
    }

    /**
     * Prepare request information
     *
     * @return null Always null (method not allowed)
     */
    public function getRequestData()
    {
        return null;
    }
    /**
     * Return calculated shipping rates
     *
     * @return array Shipping rates
     */
    public function getSimpleRates()
    {
        return null;
    }
     
    /**
     * Returns shipping service information
     * @return array information
     */
    public static function getInfo()
    {
        return array(
            'name' => __('carrier_gt'),
            'tracking_url' => 'https://www.taxydromiki.com/track/%s'
        );
    }
}
