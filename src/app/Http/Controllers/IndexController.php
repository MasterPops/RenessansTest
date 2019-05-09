<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
       	$xml=simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp");
        return view('welcome')->with('xml', $xml);
    }

    public function valute(Request $request)
    {
    	$date_old = date('d/m/Y', time() - 864000);
    	$date_now = date('d/m/Y');
    	if (!empty($request->date_old) && !empty($request->date_now)) 
    	{
    		$date_old = date('d/m/Y', strtotime($request->date_old));
    		$date_now = date('d/m/Y', strtotime($request->date_now));
    	}
    	$xml=simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp");
       	foreach($xml->Valute as $val)
        {
        	if ($val['ID'] == $request->id)
        	{
        		return view('valute')->with('val', $val)->with('recs', simplexml_load_file("http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".$date_old."&date_req2=".$date_now."&VAL_NM_RQ=".$request->id))->with('dateold', $date_old)->with('datenow', $date_now);
        	}
        }                       
        	return view('welcome')->with('xml', $xml);
    }
}
