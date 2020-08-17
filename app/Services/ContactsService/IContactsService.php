<?php

namespace App\Services\ContactsService;

use Illuminate\Http\UploadedFile;

/**
 * Interface IContactsService
 * @author Alberto Almazan
 */
interface IContactsService
{
	public function storeFile(UploadedFile $file);
	public function readFile(UploadedFile $file);
}
