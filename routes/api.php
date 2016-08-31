<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function() {
    Route::get('tasks', function() {
        return App\Task::latest()->orderBy('created_at', 'desc')->get();
    });

    Route::get('task/{id}', function($id) {
        return App\Task::findOrFail($id);
    });

    Route::post('task/store', function(Request $request) {
        \Log::info('create');
        return App\Task::create([
            'body' => $request->input(['body'])
        ]);
    });

    Route::patch('task/{id}', function(Request $request, $id) {
        \Log::info('update');
        App\Task::findOrFail($id)->update(['body' => $request->input(['body'])]);
    });

    Route::delete('task/{id}', function($id) {
        return App\Task::destroy($id);
    });
});
