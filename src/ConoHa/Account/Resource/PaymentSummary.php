<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class PaymentSummary extends BaseResource
{
    /**
     * total_deposit_amount
     *
     * @var int $total_deposit_amount
     */
    private $total_deposit_amount;

    /**
     * total_deposit_amountのセット
     *
     * @param int total_deposit_amount
     */
    public function setTotalDepositAmount($total_deposit_amount)
    {
        $this->total_deposit_amount = $total_deposit_amount;
    }

    /**
     * total_deposit_amountの取得
     *
     * @return int
     */
    public function getTotalDepositAmount()
    {
        return $this->total_deposit_amount;
    }
}
