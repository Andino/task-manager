<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreAndUpdateRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     * @param Task $task
     */
    public function __construct(
        protected Task $task,
    ) {
        $this->task = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return TaskResource
     */
    public function index()
    {
        $tasks = $this->task->orderBy("priority")->get();
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAndUpdateRequest  $request
     * @return TaskResource
     */
    public function store(StoreAndUpdateRequest $request)
    {
        $latest_priority = $this->task->orderBy("priority")->first();
        $task = $this->task->fill($request->all());
        $task->priority = $latest_priority->priority + 1;
        $task->save();
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  Task $task
     * @return TaskResource
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreAndUpdateRequest  $request
     * @param  Task  $task
     * @return TaskResource
     */
    public function update(StoreAndUpdateRequest $request, Task $task)
    {
        $old_task = $this->task->wherePriority($request->priority)->first();
        //We switch the priority number for both tasks
        if($old_task){
            $old_task->priority = $task->priority;
            $old_task->update();
        }
        $task->fill($request->all());
        $task->update();
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return TaskResource
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return new TaskResource($task);
    }
}
