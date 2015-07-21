<?php

namespace ConoHa\Account;

use ConoHa\Common\BaseService;
use ConoHa\Common\ResourceCollection;
use ConoHa\Account\Resource\OrderItem;

class Service extends BaseService
{
    public function orderItems()
    {
        $res = $this->getClient()->get($this->getUri('order-items'));

        $item = new OrderItem();
        $col = new ResourceCollection();
        $col->fill($item, $res->getJson()->order_items);
        return $col;
    }
}
