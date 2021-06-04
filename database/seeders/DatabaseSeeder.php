<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** Countries */
        $file_country = fopen('countries.csv', 'r');
        while(($row = fgetcsv($file_country, 0, ',')) != false)
        {
            DB::table('countries')->insert([
                'id'=>$row[0],
                'name'=>$row[1],
                'iso_code_2'=>$row[2],
                'iso_code_3'=>$row[3],
                'currency_code'=>$row[4],
                'currency_symbol'=>$row[5],
                'is_active'=>$row[6]
            ]);
        }
        /** Counters */
        DB::table('counters')->create(
            [
                [
                    'name'=>'document_flow',
                    'prefix'=>'',
                ],
                [
                    'name'=>'customers',
                    'prefix'=>'C',
                ],
                [
                    'name'=>'suppliers',
                    'prefix'=>'S',
                ],
                [
                    'name'=>'products',
                    'prefix'=>'P',
                ],
                [
                    'name'=>'credit_note',
                    'prefix'=>'CN',
                ],
                [
                    'name'=>'quotation',
                    'prefix'=>'Q',
                ],
                [
                    'name'=>'receipts',
                    'prefix'=>'R',
                ],
                [
                    'name'=>'sales_order',
                    'prefix'=>'SO',
                ],
                [
                    'name'=>'tax_invoice',
                    'prefix'=>'IN',
                ],
                [
                    'name'=>'goods_received_note',
                    'prefix'=>'GRN',
                ],
                [
                    'name'=>'goods_delivery_note',
                    'prefix'=>'GDN',
                ],
                [
                    'name'=>'purchase_order',
                    'prefix'=>'PO',
                ],
                [
                    'name'=>'supplier_invoice',
                    'prefix'=>'SI',
                ],
            ]
        );
        /** Ledger Groups */
        DB::table('ledger_groups')->create([
            [
                'name'=>'Assets',
                'start_range'=>600,
                'end_range'=>899,
                'normal_balance'=>'D'
            ],
            [
                'name'=>'Expenses',
                'start_range'=>200,
                'end_range'=>499,
                'normal_balance'=>'D'
            ],
            [
                'name'=>'Income',
                'start_range'=>150,
                'end_range'=>199,
                'normal_balance'=>'C'
            ],
            [
                'name'=>'Retained',
                'start_range'=>500,
                'end_range'=>599,
                'normal_balance'=>'D'
            ],
            [
                'name'=>'Liability',
                'start_range'=>900,
                'end_range'=>999,
                'normal_balance'=>'C'
            ],
        ]);
    }
}
