<?php

namespace App\Services\UploadService;

use App\Models\Provider;
use App\Services\AttachmentService\AttachmentService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class UploadService implements IUploadService
{
	public function upload(UploadedFile $file, $destination)
	{
		$response = [
			'message' => '',
			'fileName' => '',
			'fileDir' => '',
			'file' => null,
			'status' => false
		];

		// En esta línea hacemos la diferencia de que si no es un PDF no es aceptado
		if ($file->getClientMimeType() != 'application/pdf')
		{
			if (env('APP_DEBUG'))
				Log::error('El archivo no es pdf, es del tipo: '.$file->getClientMimeType());

			$response['message'] = trans('message.no_file_type');
			return $response;
		}
		

		$file_name = time() . '-' . $file->getClientOriginalName();
		$file_name = str_replace(" ", "_", $file_name);

		if (!$file->isValid())
			return $response['message'] = trans('file.invalid');

		$file_destination = $file->storeAs($destination, $file_name, 'public');

		$response['message'] = trans('file.success_upload');
		$response['fileDir'] = asset("storage" . DIRECTORY_SEPARATOR . $file_destination);;
		$response['fileName'] = $file_name;
		$response['status'] = true;

		return $response;
	}

	public function getUploadedData()
	{
	}

	public function uploadXls(UploadedFile $file, $destination)
	{
		$response = [
			'message' => '',
			'fileName' => '',
			'fileDir' => '',
			'file' => null,
			'status' => false
		];

		// En esta línea hacemos la diferencia de que si no es un PDF no es aceptado
		if ($file->getClientMimeType() !== 'application/vnd.ms-excel' && $file->getClientMimeType() !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
		{
			if (env('APP_DEBUG'))
				Log::error('El archivo no es un Excel, es del tipo: '.$file->getClientMimeType());

			$response['message'] = trans('message.no_file_type');
			return $response;
		}
		

		$file_name = time() . '-' . $file->getClientOriginalName();
		$file_name = str_replace(" ", "_", $file_name);

		if (!$file->isValid())
			return $response['message'] = trans('file.invalid');

		$file_destination = $file->storeAs($destination, $file_name, 'public');

		$response['message'] = trans('file.success_upload');
		$response['fileDir'] = asset("storage" . DIRECTORY_SEPARATOR . $file_destination);;
		$response['fileName'] = $file_name;
		$response['status'] = true;

		return $response;
	}

	public function uploadAttach($attachment, $directory, $type)
	{
		// Usamos el servicio de carga de archivos para subir el PDF
		$uploaded_data = $this->upload($attachment, $directory);

		$tempAttach = array();

		// Se valida si se subió correctamente el archivo
		if ($uploaded_data['status'])		
		{
			// Se arma el array para guardar la factura
			$tempAttach = [
				'attach_type' => $type,
				'file' => $uploaded_data['fileName'],
				'name' => $uploaded_data['fileName'],
				'url' => $uploaded_data['fileDir'],
			];

			// Se instancia el servicio de las facturas
			$attachService = new AttachmentService();
			
			// Se regresa el array de la factura
			return $attachService->createFrom($tempAttach, true);
		}

		return false;
	}

	public function uploadCsv(UploadedFile $file, $destination)
	{
		$response = [
			'message' => '',
			'fileName' => '',
			'fileDir' => '',
			'file' => null,
			'status' => false
		];

		// En esta línea hacemos la diferencia de que si no es un PDF no es aceptado
		if ( $file->getClientMimeType() !== 'text/csv' )
		{
			if (env('APP_DEBUG'))
				Log::error('El archivo no es un Csv, es del tipo: '.$file->getClientMimeType());

			$response['message'] = trans('message.no_file_type');
			return $response;
		}
		

		$file_name = time() . '-' . $file->getClientOriginalName();
		$file_name = str_replace(" ", "_", $file_name);

		if (!$file->isValid())
			return $response['message'] = trans('file.invalid');

		$file_destination = $file->storeAs($destination, $file_name, 'public');

		$response['message'] = trans('file.success_upload');
		$response['fileDir'] = asset("storage" . DIRECTORY_SEPARATOR . $file_destination);;
		$response['fileName'] = $file_name;
		$response['status'] = true;

		return $response;
	}
}
