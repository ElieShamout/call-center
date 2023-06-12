<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function get_clients(Request $request)
    {
        if (isset($request->keyword) && $request->keyword != '') {
            $full_name = explode(' ', $request->keyword);

            $full_name[0] = $full_name[0] ?? '';
            $full_name[1] = $full_name[1] ?? '';
            $full_name[2] = $full_name[2] ?? '';

            $clients = DB::table('client')
                ->where('client.first_name', 'LIKE', '%' . $full_name[0] . '%')
                ->where('client.middle_name', 'LIKE', '%' . $full_name[1] . '%')
                ->where('client.last_name', 'LIKE', '%' . $full_name[2] . '%')
                ->get()->all();
            return $clients;
        } else {
            $clients = Client::get();
            return $clients;
        }
    }

    public function get_client(Request $request)
    {
        $client = Client::find($request->id)->get()->first();
        return $client;
    }

    public function new_client(Request $request)
    {
    }

    public function update_client(Request $request)
    {
    }

    public function delete_client(Request $request)
    {
    }
}
