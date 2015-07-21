<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class OrderItem extends BaseResource
{
    protected $properties = [
        'uu_id' => null,
        'service_name' => null,
        'service_start_date' => null,
        'item_status' => null,
    ];

    public function populate(\StdClass $res)
    {
        $this->setUuId($res->uu_id);
        $this->setServiceName($res->service_name);
        $this->setServiceStartDate($res->service_start_date);
        $this->setItemStatus($res->item_status);
    }
}
