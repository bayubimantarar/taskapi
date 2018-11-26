<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $tasks = Task::orderBy("created_at", "DESC")
            ->get();

        return response()
            ->json([
                "data" => [
                    "type" => "Tasks",
                    "data" => $tasks
                ]
            ], 200);
    }

    public function show($id)
    {
        $tasks = Task::find($id);

        return response()
            ->json([
                "data" => [
                    "type" => "Tasks",
                    "data" => $tasks
                ]
            ], 200);
    }

    public function store(Request $request)
    {
        $title = $request->title;

        $data = [
            'title' => $title
        ];

        $storeTasks = Task::create($data);

        return response()
            ->json([
                "data" => [
                    "type" => "Tasks",
                    "created" => true
                ]
            ], 200);
    }
}
