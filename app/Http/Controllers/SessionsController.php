<?php

namespace App\Http\Controllers;

use App\Models\SessionInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{
    public function get_sessions(Request $request)
    {

        $sessions = SessionInfo::get();

        return $sessions;
    }

    public function new_session()
    {
    }

    public function update_session(Request $request)
    {
    }

    public function delete_session(Request $request)
    {
    }
}
