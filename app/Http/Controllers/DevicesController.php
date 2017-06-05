<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Device;
use DB;
use Datatables;


class DevicesController extends Controller
{

	/**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
	    return view('devices.index');
	}

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function anyData()
	{

		// $values = DB::table('devices')->select('id', 'mac_addr', 'description',
		// 			DB::raw([]))
		// 			->whereNull('deleted_at');
		// $out = Datatables::of($values)->make();
		// $data = $out->getData();

// $values = DB::table("devices AS d")
//     ->select(DB::raw([ "d.id, d.mac_addr, d.description ( SELECT MAX(ts) FROM reports WHERE device = devices.id ) AS last_reported_ts, 
//     	(SELECT date_format(MAX(ts), \'%d/%c/%Y %H:%i:%s\') FROM reports WHERE device = devices.id) AS last_reported_ts,
//     	 (SELECT name FROM device_config, server_config WHERE device = devices.id AND server = server_config.id) AS server_config,
//     	 (SELECT data FROM report_data, reports WHERE kind = 'VER' AND report = reports.id AND device = devices.id ORDER BY ts DESC LIMIT 1) AS fw_version"] )
//     ->whereNull('deleted_at')
//     ->orderBy('d.last_reported_ts');
    // ->get();


$values = \DB::table('devices AS c')
    ->select(\DB::raw('c.*, ( SELECT MAX(ts) FROM reports WHERE reports.device = c.id) AS last_reported_ts, 
    						( SELECT data FROM report_data, reports WHERE report_data.kind = "VER" AND report_data.report = reports.id AND reports.device = c.id ORDER BY reports.ts DESC LIMIT 1) AS fw_version'))
	->whereNull('c.deleted_at');
    // ->orderBy('c.last_reported_ts');
    // ->get();



		//return Datatables::of($values)->make();
		// $data = $out->getData();


// $result = $conn->query("SELECT  mac_addr, 
//                                 description, 
//                                 (select max(ts) from reports where device = devices.id) as last_reported_ts, 
//                                 (select date_format(max(ts), \"%d/%c/%Y %H:%i:%s\") from reports where device = devices.id) as last_reported, 
//                                 (select name from device_config, server_config where device = devices.id and server = server_config.id) as server_config, 
//                                 (select data from report_data, reports where kind = 'VER' and report = reports.id and device = devices.id order by ts desc limit 1) as fw_version 
//                                 FROM devices order by last_reported_ts desc");



	    return Datatables::of($values)->make(true);
	}
    
}
