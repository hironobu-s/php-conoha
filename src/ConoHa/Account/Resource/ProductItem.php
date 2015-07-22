<?php

namespace Conoha\Account\Resource;

use ConoHa\Common\BaseResource;

class ProductItem extends BaseResource
{
    /**
     * product_name
     *
     * @var string $product_name
     */
    private $product_name;

    /**
     * unit_price
     *
     * @var float $unit_price
     */
    private $unit_price;

    /**
     * region_name
     *
     * @var string $region_name
     */
    private $region_name;

    /**
     * service_name
     *
     * @var string $service_name
     */
    private $service_name;



    /**
     * product_nameのセット
     *
     * @param string product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * product_nameの取得
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * unit_priceのセット
     *
     * @param float unit_price
     */
    public function setUnitPrice($unit_price)
    {
        $this->unit_price = $unit_price;
    }

    /**
     * unit_priceの取得
     *
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * region_nameのセット
     *
     * @param string region_name
     */
    public function setRegionName($region_name)
    {
        $this->region_name = $region_name;
    }

    /**
     * region_nameの取得
     *
     * @return string
     */
    public function getRegionName()
    {
        return $this->region_name;
    }

    /**
     * service_nameのセット
     *
     * @param string service_name
     */
    public function setServiceName($service_name)
    {
        $this->service_name = $service_name;
    }

    /**
     * service_nameの取得
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

}
