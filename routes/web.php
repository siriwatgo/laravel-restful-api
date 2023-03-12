<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Overriding Routes for Passport 11
Route::group([
    'as' => 'passport.',
    'prefix' => config('passport.path', 'oauth'),
    'namespace' => 'Laravel\Passport\Http\Controllers',
], function () {
    // Passport routes...
    Route::post('/token', [
        'user' => 'AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => [
            // this is middleware
        ],
    ]);
});

// Serve S3 media
// Route::group(['domain' => parse_url(config('filesystems.disks.s3.url'), PHP_URL_HOST)], function() {
//     Route::get('/{numeric}/{filename}', function($id, $filename) {
//         $mediaPath = "/${id}/${filename}";

//         if(Storage::disk('s3')->has($mediaPath)){
//             $data = Storage::disk('s3')->get($mediaPath);
//             $metadata = Storage::disk('s3')->getMetadata($mediaPath);

//             $headers = [
//                 'Content-type' => $metadata['mimetype'],
//                 'Last-Modified' => gmdate('D, d M Y H:i:s', $metadata['timestamp']) . ' GMT',
//                 'Etag' => $metadata['etag'],
//                 'Cache-Control' => 'private, max-age=31536000',
//             ];

//             return response($data, 200, $headers);
//         }

//         return redirect(dirname(config('product-feed.base_url')) . '/page-not-found');
//     })->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
// });