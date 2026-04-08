<?php

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

if (!function_exists('logActivity')) {

    function logActivity($table, $recordId, $action, $old = null, $new = null)
    {
        AuditLog::create([
            'table_name' => $table,
            'record_id' => $recordId,
            'action' => $action,
            'old_data' => $old,
            'new_data' => $new,
            'user_id' => Auth::id()
        ]);
    }
}