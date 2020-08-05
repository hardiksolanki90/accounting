<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Invoice;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'invoice_id', 'description', 'hours', 'per_hour_price', 'total'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'client_id', 'id');
    }
}
