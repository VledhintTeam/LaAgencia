<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;
use Tests\TestCase;

class ImportCsvTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCsvLoad()
    {
		Excel::fake();
		$fileUrl = public_path('storage/contacts/1597362132-trees.csv');
		//$array = (new ContactsArray)->toArray($fileFullUrl);
		$array = Excel::toArray(new ContactsImport, $fileUrl);
		$this->assertIsArray($array);	
    }
}
