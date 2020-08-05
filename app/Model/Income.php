<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Bank;

class Income extends Model
{
    protected $fillable = [
        'invoice_number', 'amount', 'type', 'date_of_transaction', 'transaction_id', 'bank_id', 'created_by', 'modified_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
