<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;
use Illuminate\Http\Request;

class EmailLogController extends Controller
{
    public function index()
    {
        $emailLogs = EmailLog::latest()->paginate(15);
        return view('email-logs.index', compact('emailLogs'));
    }
}
