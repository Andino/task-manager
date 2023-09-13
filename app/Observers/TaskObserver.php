<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskObserver
{
    /**
     * Handle the Task "creating" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function creating(Task $task)
    {
        $latest_order = Task::orderBy("order", 'desc')->first();
        if ($latest_order) {
            $task->order = $latest_order->order + 1;
        }
        $task->priority = $this->priorityUpdate($task);
    }

    /**
     * Handle the Task "updating" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updating(Task $task)
    {
        $task->priority = $this->priorityUpdate($task);
    }

    /**
     * Handle the Task "deleting" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleting(Task $task)
    {
        // We change the priority of the task that follows
        $previous_task = Task::whereOrder($task->order - 1)->first();
        if ($previous_task) {
            $order_task = Task::find($previous_task->id);
            $order_task->priority = $this->priorityUpdate($order_task);
        }
    }

    /**
     * Handle the Task "deleting" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        DB::update('UPDATE tasks t SET t.order = t.order-1 where t.order > ?;', [$task->order]);
    }


    /**
     * Handle the Task "restored" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle priority update.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    private function priorityUpdate(Task $task)
    {
        $task_quantity = Task::count();
        $first_task = Task::orderBy("order")->first();
        if ($task_quantity > 0) {
            $percentage = ($task->order / $task_quantity) * 100;
        } else {
            $percentage = 0;
        }
        switch (true) {
            case $percentage >= 70:
                return "High";
                break;
            case $percentage > 40 && $percentage < 70:
                return "Medium";
                break;
            case $percentage <= 40:
                return "Low";
                break;
        }
    }
}
