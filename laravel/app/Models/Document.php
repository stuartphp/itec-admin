<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documents';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Un Comment if you want to use soft deletes
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'created_by',
        'document_flow_id',
        'document_type',
        'gcs',
        'action_date',
        'account_number',
        'entity_id',
        'entity_name',
        'document_number',
        'physical_address',
        'delivery_address',
        'entity_reference',
        'salesperson_id',
        'due_date',
        'notes',
        'period',
        'courier_id',
        'tracking_number',
        'document_image',
        'on_hold',
        'total_nett_price',
        'total_excl',
        'total_discount',
        'total_tax',
        'total_amount',
        'is_locked',
        'is_paid',

        ];

    function tax_invoices()
    {
        return $this->belongsTo(DocumentType::class, 'id', 'document_id');
    }
    public function types()
    {
        return $this->belongsTo(DocumentType::class, 'id', 'document_id');
    }
}
