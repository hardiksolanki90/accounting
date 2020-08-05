<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\InvoiceDetail;

class Invoice extends Model
{
    protected $fillable = [
        'prefix', 'number', 'date', 'due_date', 'client_id', 'billing_type', 'applicable_tax_percentage', 'status', 'created_by', 'modified_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function invoiceDetail()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
}
