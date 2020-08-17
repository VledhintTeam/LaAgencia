<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactsService\IContactsService;

class ContactsController extends Controller
{
	private $contactsService;
	/**
	 * Constructor function
	 *
	 * @return void
	 */
	public function __construct(IContactsService $service)
	{
		return $this->contactsService = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Function to store the file
	 *
	 * @return void
	 */
	public function storeBatch(Request $request)
	{
		if ($request->hasFile('contactsfile'))
		{ 
			$data = $this->contactsService->readFile($request->file('contactsfile'));
			if ( is_array($data['contacts']) && count($data['contacts']) > 0 )
				return redirect()->action('ContactsController@select', ['contacts' => $data['contacts'], 'file' => $data['file']]);
		}
		return back()->witherrors(['message' => __('message.fail_batch')]);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 */
	public function select($contacts, $file)
	{
        return view('contacts.select');
	}
	
}
