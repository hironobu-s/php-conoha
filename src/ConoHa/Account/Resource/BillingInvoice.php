<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;

class BillingInvoice extends BaseResource
{

    /**
     * invoice_id
     *
     * @var int $invoice_id
     */
    protected $invoice_id;

    /**
     * payment_method_type
     *
     * @var string $payment_method_type
     */
    protected $payment_method_type;

    /**
     * invoice_createdDate
     *
     * @var \DateTime $invoice_createdDate
     */
    protected $invoice_createdDate;

    /**
     * invoice_date
     *
     * @var \DateTime $invoice_date
     */
    protected $invoice_date;

    /**
     * bill_plas_tax
     *
     * @var int $bill_plas_tax
     */
    protected $bill_plas_tax;

    /**
     * due_date
     *
     * @var \DateTime $due_date
     */
    protected $due_date;



    /**
     * invoice_idのセット
     *
     * @param int invoice_id
     */
    public function setInvoiceId($invoice_id)
    {
        $this->invoice_id = $invoice_id;
    }

    /**
     * invoice_idの取得
     *
     * @return int
     */
    public function getInvoiceId()
    {
        return $this->invoice_id;
    }

    /**
     * payment_method_typeのセット
     *
     * @param string payment_method_type
     */
    public function setPaymentMethodType($payment_method_type)
    {
        $this->payment_method_type = $payment_method_type;
    }

    /**
     * payment_method_typeの取得
     *
     * @return string
     */
    public function getPaymentMethodType()
    {
        return $this->payment_method_type;
    }

    /**
     * invoice_createdDateのセット
     *
     * @param \DateTime invoice_created_date
     */
    public function setInvoiceCreatedDate($invoice_created_date)
    {
        if(is_string($invoice_created_date)) {
            $invoice_created_date = new \DateTime($invoice_created_date);
        }
        $this->invoice_createdDate = $invoice_created_date;
    }

    /**
     * invoice_createdDateの取得
     *
     * @return \DateTime
     */
    public function getInvoiceCreatedDate()
    {
        return $this->invoice_createdDate;
    }

    /**
     * invoice_dateのセット
     *
     * @param \DateTime invoice_date
     */
    public function setInvoiceDate($invoice_date)
    {
        if(is_string($invoice_date)) {
            $invoice_date = new \DateTime($invoice_date);
        }
        $this->invoice_date = $invoice_date;
    }

    /**
     * invoice_dateの取得
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * bill_plas_taxのセット
     *
     * @param int bill_plas_tax
     */
    public function setBillPlasTax($bill_plas_tax)
    {
        $this->bill_plas_tax = $bill_plas_tax;
    }

    /**
     * bill_plas_taxの取得
     *
     * @return int
     */
    public function getBillPlasTax()
    {
        return $this->bill_plas_tax;
    }

    /**
     * due_dateのセット
     *
     * @param \DateTime due_date
     */
    public function setDueDate($due_date)
    {
        if(is_string($due_date)) {
            $due_date = new \DateTime($due_date);
        }
        $this->due_date = $due_date;
    }

    /**
     * due_dateの取得
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

}
