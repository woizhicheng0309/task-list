<?php

use Illuminate\Support\Facades\Route;

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {}
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/',function(){
    // return redirect(route('tasks.index'));
    return redirect()->route('tasks.index');
})->name('root');

Route::get('/task', function () use($tasks) {
    return view('index', [
        'tasks' => $tasks, // tasks is an array passed to index view, inside the array it contain Task object // item on left is the var passed to blade
    ]);
})->name('tasks.index');

Route::get('/task/{id}', function($id) use($tasks){
    $task = collect($tasks);
    return view('show',[
        'task' => $task,
        'id' => $id,
    ]);
})->name('tasks.show');

// Route::get('/task/{id}',function($id) use($tasks){
//     // return 'One single task, id = ' . $id;
//     return view('show',[
//         'tasks' => $tasks,
//         'id' => $id,
//     ]);
// })->name('tasks.show');

// Route::get("/xxx", function () { # /xxx is a URL here
//     return "Hello";
// })->name('helloRoute'); # helloRoute is a route name here

// Route::get("/greet/{name}", function ($name) {
//     return "Hello " . $name . "!";
// });

// Route::get("/frontdesk/{name}", function ($name) {
//     return "How can I help you " . $name . " ?";
// })->name('frontddesk');

// Route::get("hallo", function () {
//     return redirect()->route('helloRoute');
// });

Route::fallback(function () { # all route that does not exist still go to fallback
    return "still got somewhere!";
});
