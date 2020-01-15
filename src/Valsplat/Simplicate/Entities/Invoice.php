<?php

namespace Valsplat\Simplicate\Entities;

use Valsplat\Simplicate\Actions;
use Valsplat\Simplicate\Entity;

class Invoice extends Entity
{
    use Actions\Getable;
    use Actions\Listable;
    use Actions\Storable;
    use Actions\Deletable;

    protected $fillable = [
        'payment_term_id', // (string, optional)
        'invoice_lines', // (Array[PostInvoiceLine], optional)
        'status_id', // (string, optional)
        'my_organization_profile_id', // (string, optional)
        'organization_id', // (string, optional)
        'person_id', // (string, optional)
        'date', // (string, optional)
        'subject', // (string, optional)
        'reference', // (string, optional)
        'project_id', // (string, optional)
        'comments', // (string, optional)
    ];

    protected $endpoint = 'invoices/invoice/';
    // protected $namespace = '';


    // $invoiceLineFillables = [
    //     'vat_class_id', // (string, optional)
    //     'revenue_group_id', // (string, optional)
    //     'date', // (string, optional)
    //     'description', // (string, optional)
    //     'amount', // (number, optional)
    //     'price', // (number, optional)
    // ];

    /**
     * Use date and payment term to generate duedate
     * @return DateTime
     */
    public function dueDate()
    {
        if (isset($this->payment_term) && isset($this->date)) {
            $date = new \DateTime($this->date);
            $paymentTermDays = $this->payment_term['days'];
            return $date->modify(sprintf('+%d days', $paymentTermDays));
        }
    }

}
