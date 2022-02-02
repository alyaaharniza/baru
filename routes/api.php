<?php

use App\Http\Controllers\StudentController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('student/add', [StudentController::class, 'store']);

Route::get('/person', function(){
    $person = [
        'first_name' => 'Alya',
        'last_name' => 'Haniza'
    ];  
    return $person;
});

Route::post('/login', function (Request $request) {
    // email
    // password
    $email = $request->input('email');
    $password = $request->input('password');

    $data = User::where('email', $email)->first();
    if ($data) {
        // bcrypt('123123')
        if (\Hash::check($password, $data->password)) {
            return response()->json([
            'user' => $data,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }
    } else {
        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }
});
