<?php 
namespace App\Services;

use App\InventoryLedger;
use App\Repositories\Repository;

class InventoryLedgerService 
{
    public function posting($data){
        $data = $data->first();
        $items = $data['details'][0];

        $adjustmentCoa = $data['akun_penyesuaian'];
        $inventoryCoa = $items['akun_persediaan'];
        //Blum dikali harga barang
        // if ref == stock opnamee
        $diff = $items['pivot']['jumlah_tercatat']  - $items['pivot']['jumlah_fisik'];
        if ($diff > 0){
            $debit = $diff;
            $kredit  = $diff * -1;
            $debitCoa = $inventoryCoa;
            $creditCoa = $adjustmentCoa; 
        } 
        else{
            $debit = $diff * -1;
            $kredit = $diff;
            $debitCoa = $adjustmentCoa;
            $creditCoa = $inventoryCoa; 

        }
        // return $diff;
        


        //Elif Inventory Transfer 

        $debitCoa = $creditCoa =  $inventoryCoa; 
    


        //end elif
        $ledger = [
            'kode_ref'        => 'AABBC',
            'akun_debit'      => $debitCoa,
            'akun_kredit'     => $creditCoa,
            'units'           => $items['satuan_unit'],
            'debit'           => $debit,
            'kredit'          => $kredit,

        ];

        return InventoryLedger::create($ledger);




    }
}















?>