<?php

namespace App\Services;
use App\Models\Quotation;

class QuotationService
{
    public function saveQuotationDetails(Quotation $quotation, $quotationDetail)
    {
        if ($quotationDetail) {
            $quotation
                ->quotationDetails()
                ->createMany($quotationDetail);
        }
    }

    public function saveQuotationPayments(Quotation $quotation, $quotationPayments)
    {
        if ($quotationPayments) {
            $quotation
                ->quotationPayments()
                ->createMany($quotationPayments);
        }
    }
}
