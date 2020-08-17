<?php

namespace App\Services\ContactsService;

use App\Services\UploadService\UploadService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;

/**
 * Class ContactsService
 * @author Alberto Almazan
 */
class ContactsService implements IContactsService
{
	public function storeFile($fileUrl)
	{
		try{
			$contactsImport = new ContactsImport();
			Excel::import(new ContactsImport, $fileUrl);
		} catch (Exception $e) {
			Log::info($e->getMessage());
		}
	}

	public function readFile(UploadedFile $file)
	{
		$contactsArray = array();
		try{
			$uploadService = new UploadService();
			$uploadedData = $uploadService->uploadCsv($file, 'contacts');
			if ($uploadedData['status'])// Se valida si se subió correctamente el archivo
			{
				Log::info("Data leida correctamente");
				Log::info($uploadedData);
				// Se importa el archivo por medio de la libreria de excel
				$fileUrl = public_path('storage/contacts/'.$uploadedData['fileName']);
				$contactsArray = Excel::toArray(new ContactsImport, $fileUrl);
			}
			return array('contacts' => $contactsArray, 'file' => $fileUrl);
		} catch (Exception $e) {
			Log::info($e->getMessage());
		}

		return false;

	}
}
