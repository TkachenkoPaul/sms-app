<?php

namespace App\Imports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class SubscribersImport implements ToModel, WithMappedCells
{
    use Importable;

    public function mapping(): array
    {
        return [
            'name' => 'B5',
            'phone' => 'C5',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Subscriber([
            'name' => $row['name'],
            'phone' => $row['phone'],
        ]);
    }
}
