<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Importusesr;

class ImportController extends Controller
{

    public function index()
    {
		$count = Importusesr::count();
        return view('import.index', compact('count'));
    }
	
	public function import()
	{
		$response = Http::get('https://randomuser.me/api/?results=5000');
		
		$data = $response->json();
		
		$count_update = 0;
		$count_insert = 0;
		
		foreach($data['results'] as $item)
		{
			$value['first_name'] = $item['name']['first'];
			$value['last_name'] = $item['name']['last'];
			$value['email'] = $item['email'];
			$value['age'] = $item['dob']['age'];
			
			$importusesr = Importusesr::where('first_name', $value['first_name'])->where('last_name', $value['last_name'])->get();
			
			if($importusesr->count() == 0)
			{
				$importusesr = Importusesr::create($value);
				$count_insert++;
			} else {
				$user = Importusesr::find($importusesr[0]->id);
				$user->email = $value['email'];
				$user->age = $value['age'];
				$user->save();
				$count_update++;
			}
		}
		
		$result['count_update'] = $count_update;
		$result['count_insert'] = $count_insert;
		$result['count_total'] = Importusesr::count();
		
		return $result;
	}
}
