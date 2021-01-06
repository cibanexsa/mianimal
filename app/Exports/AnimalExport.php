<?php

namespace App\Exports;

use App\Models\Animal;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnimalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Animal::all();
    }
}
