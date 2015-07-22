<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class PaymentHistory extends BaseResource
{
    /**
     * money_type
     *
     * @var string $money_type
     */
    private $money_type;

    /**
     * deposit_amount
     *
     * @var string $deposit_amount
     */
    private $deposit_amount;

    /**
     * received_date
     *
     * @var \DateTime $received_date
     */
    private $received_date;



    /**
     * money_typeのセット
     *
     * @param string money_type
     */
    public function setMoneyType($money_type)
    {
        $this->money_type = $money_type;
    }

    /**
     * money_typeの取得
     *
     * @return string
     */
    public function getMoneyType()
    {
        return $this->money_type;
    }

    /**
     * deposit_amountのセット
     *
     * @param string deposit_amount
     */
    public function setDepositAmount($deposit_amount)
    {
        $this->deposit_amount = $deposit_amount;
    }

    /**
     * deposit_amountの取得
     *
     * @return string
     */
    public function getDepositAmount()
    {
        return $this->deposit_amount;
    }

    /**
     * received_dateのセット
     *
     * @param string received_date
     */
    public function setReceivedDate($received_date)
    {
        if(is_string($received_date)) {
            $received_date = new \DateTime($received_date, new \DateTimezone('UTC'));
        }
        $this->received_date = $received_date;
    }

    /**
     * received_dateの取得
     *
     * @return \DateTime
     */
    public function getReceivedDate()
    {
        return $this->received_date;
    }
}
