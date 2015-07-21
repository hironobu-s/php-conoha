<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class PaymentHistory extends BaseResource
{
    protected $properties = [
        'money_type'     => null,
        'deposit_amount' => null,
        'received_date'  => null,
    ];

    public function setReceivedDate($date)
    {
        if(is_string($date)) {
            $date = new \DateTime($date, new \DateTimezone('UTC'));
        }
        $this->properties['received_date'] = $date;
    }
}
