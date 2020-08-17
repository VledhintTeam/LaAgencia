<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContactsImport implements ToModel, WithHeadingRow, WithMapping
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
		Log::info("Datos de la fila");
		Log::info($row);
    }

	public function map($row): array
	{
		Log::info("Fila de map");
		Log::info($row);
		return [];
	}
}
