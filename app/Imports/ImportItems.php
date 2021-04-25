<?php

namespace App\Imports;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\Importable;

class ImportItems implements ToModel, WithHeadingRow, WithUpserts
{
    use Importable;

    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model ( array $row )
    {
        //Auto map categories by checking the existing ones
        $item = Item ::with ( 'category' ) -> where ( 'name', $row[ 'item_name' ] ) -> first ();
        return new Item( [
            'name' => $row[ 'item_name' ],
            'price' => $row[ 'item_price' ],
            'category' => $item -> category ?? null,
            'created_at' => Carbon ::now (),
            'updated_at' => Carbon ::now ()
        ] );
    }

    /**
     * @return int
     */
    public function headingRow () : int
    {
        return 1;
    }

    /**
     * @return string|array
     */
    public function uniqueBy ()
    {
        return 'name';
    }
}
