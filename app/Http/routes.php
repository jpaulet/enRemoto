<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() {
    return view('index');
});

$app->get('auth/log', ['uses' => 'App\Http\Controllers\Auth\AuthController@getLog']);
$app->post('auth/login', ['uses' => 'App\Http\Controllers\Auth\AuthController@postLogin']);
$app->get('auth/logout', ['uses' => 'App\Http\Controllers\Auth\AuthController@getLogout']);
$app->get('auth/register', ['uses' => 'App\Http\Controllers\Auth\AuthController@getRegister']);
$app->post('auth/register', ['uses' => 'App\Http\Controllers\Auth\AuthController@postRegister']);

$app->get('password/email', ['uses' => 'App\Http\Controllers\Auth\PasswordController@getEmail']);
$app->post('password/email', ['uses' => 'App\Http\Controllers\Auth\PasswordController@postEmail']);
$app->get('password/reset/{token}', ['uses' => 'App\Http\Controllers\Auth\PasswordController@getReset']);
$app->post('password/reset', ['uses' => 'App\Http\Controllers\Auth\PasswordController@postReset']);



$app->get('api', ['uses' => 'App\Http\Controllers\Controller@index']);
$app->get('api/import', ['uses' => 'App\Http\Controllers\Controller@import']);


$app->post('api/create', ['uses' => 'App\Http\Controllers\Api@create']);
$app->get('api/jobs', ['uses' => 'App\Http\Controllers\Api@jobs']);
$app->get('api/job/{id}', ['uses' => 'App\Http\Controllers\Api@job']);
$app->post('api/job', ['uses' => 'App\Http\Controllers\Api@createJob']);
//$app->put('api/job/{editLink}', ['uses' => 'App\Http\Controllers\Api@updateJob']);
$app->delete('api/job/{id}/{editLink}', ['uses' => 'App\Http\Controllers\Api@destroyJob']);

$app->get('job/{slug}/{editLink}', ['uses' => 'App\Http\Controllers\Api@editJob']);

$app->get('api/createRemoteJobs', ['uses' => 'App\Http\Controllers\Api@createRemoteJobs']);

$app->post('api/uploadFile', ['uses' => 'App\Http\Controllers\Api@uploadFile']);

/*
$app->post('/uploadFile', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'image' => 'required|image64:jpeg,jpg,png'
    ]);
    if ($validator->fails()) {
        return response()->json(['errors'=>$validator->errors()]);
    } else {
        $imageData = $request->get('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        Image::make($request->get('image'))->save(public_path('images/').$fileName);
        return response()->json(['error'=>false]);
    }
});
*/