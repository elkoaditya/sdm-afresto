<?php

\Illuminate\Support\Facades\Route::post('migrate', function (\Illuminate\Http\Request $request) {
    if ($request->header('api-key') != 'UunMZCvvreujKp4pIvPErxRFQRFbOXdUG7NZhJXZM6EciKMpV4gQ9VmUGXSp1XCMK8emIaMxb8Dq5qEOkvXCRXaDCF1zz4FdgwHohZHqkokQuIMArPE3OKz9kvWH1syx') {
        return response()->json(['status' => 'error', 'message' => 'Invalid api key']);
    }
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'shell' => 'required|string'
    ]);
    if ($validator->fails()) {
        return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
    }
    try {
        \Illuminate\Support\Facades\Artisan::call($validator->validated()['shell']);
        return response()->json(['status' => 'success', 'message' => 'Migrate success']);
    } catch (\Exception $err) {
        return response()->json(['status' => 'error', 'message' => $err->getMessage()]);
    }
});
