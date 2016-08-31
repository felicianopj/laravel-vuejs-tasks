<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'api'], function() {
    Route::get('tasks', function() {
        return App\Task::latest()->get();
    });

    Route::get('task/{id}', function($id) {
        return App\Task::findOrFail($id);
    });

    Route::post('tasks/store', function(Request $request) {
        return App\Task::create([
            'body' => $request->input(['body'])
        ]);
    });

    Route::patch('task/{id}', function(Request $request, $id) {
        App\Task::findOrFail($id)->update(['body' => $request->input(['body'])]);
    });

    Route::delete('tasks/{id}', function($id) {
        return App\Task::destroy($id);
    });
});
