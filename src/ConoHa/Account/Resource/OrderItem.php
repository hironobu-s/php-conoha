<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class OrderItem extends BaseResource
{
    /**
     * uu_id
     *
     * @var string $uu_id
     */
    protected $uu_id;

    /**
     * service_name
     *
     * @var string $service_name
     */
    protected $service_name;

    /**
     * service_start_date
     *
     * @var \DateTime $service_start_date
     */
    protected $service_start_date;

    /**
     * item_status
     *
     * @var string $item_status
     */
    protected $item_status;



    /**
     * uu_idのセット
     *
     * @param string uu_id
     */
    public function setUuId($uu_id)
    {
        $this->uu_id = $uu_id;
    }

    /**
     * uu_idの取得
     *
     * @return string
     */
    public function getUuId()
    {
        return $this->uu_id;
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

    /**
     * service_start_dateのセット
     *
     * @param \DateTime service_start_date
     */
    public function setServiceStartDate($service_start_date)
    {
        $this->service_start_date = $service_start_date;
    }

    /**
     * service_start_dateの取得
     *
     * @return \DateTime
     */
    public function getServiceStartDate()
    {
        return $this->service_start_date;
    }

    /**
     * item_statusのセット
     *
     * @param string item_status
     */
    public function setItemStatus($item_status)
    {
        $this->item_status = $item_status;
    }

    /**
     * item_statusの取得
     *
     * @return string
     */
    public function getItemStatus()
    {
        return $this->item_status;
    }


}
