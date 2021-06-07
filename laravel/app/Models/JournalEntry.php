<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'journal_entries';

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
        'journal_code',
        'transaction_flow_id',
        'action_date',
        'document_id',
        'account_number',
        'entity_name',
        'description',
        'reference',
        'type',
        'tax_type',
        'affect_journal',
        'ledger',
        'debit_amount',
        'credit_amount',

    ];
}
