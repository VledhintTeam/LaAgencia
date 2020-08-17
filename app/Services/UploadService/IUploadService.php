<?php

namespace App\Services\UploadService;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

interface IUploadService
{
	public function upload(UploadedFile $file, $destination);
	public function uploadXls(UploadedFile $file, $destination);
	public function uploadCsv(UploadedFile $file, $destination);
	public function getUploadedData();

	/*
	 * Funcion que carga un archivo al directorio que se manda como parametro .
	 * Agregando el tipo de contenido que se carga
	 * */
	public function uploadAttach($attachment, $directory, $type);
}
