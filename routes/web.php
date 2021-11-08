<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// old method
function old_method(Request $request)
{
    $users = User::select('*');
    if ($request->has("name")) {
        $users->where('name', $request->name);
    }
    if ($request->has("email")) {
        $users->where('email', $request->email);
    }
    if ($request->has("age")) {
        $users->where('age', $request->age);
    }
    if ($request->has("gender")) {
        $users->where('gender', $request->gender);
    }
    return $users->get();
}

function new_method(Request $request)
{
    return User::select('*')
        ->when($request->has("name"), function ($query) use ($request) {
            $query->where('name', $request->name);
        })
        ->when($request->has("email"), function ($query) use ($request) {
            $query->where('email', $request->email);
        })
        ->when($request->has("age"), function ($query) use ($request) {
            $query->where('age', $request->age);
        })
        ->when($request->has("gender"), function ($query) use ($request) {
            $query->where('gender', $request->gender);
        })
        ->get();
}

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function (Request $request) {
    $validator = Validator::make(
        $request->all(),
        [
            'name' => ['string'],
            'email' => ['string', 'email'],
            'gender' => ['string', 'in:male,female'],
            'age' => ['integer', 'between:10,100'],
        ]
    );
    if ($validator->fails()) {
        dd($validator->errors());
    }

    dd(new_method($request));
})->name("search");
