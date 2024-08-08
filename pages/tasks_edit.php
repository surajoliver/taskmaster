<?php 
    $record = [];
    $task_id = $_GET["id"];
    $record = Task::fetch_single($task_id);
    $errors = [];
?>


<?php require "./templates/header.php"; ?>
<section class="py-8">
    <div class="flex items-center gap-4 mb-4">
        <h1 class="text-2xl text-gray-100 font-semibold">Edit Task - <?= $record['task_name'] ?></h1>
        

    </div>

    <form method="POST" action="/task/edit" class="w-full py-8 px-12 bg-white/5 border border-green-100/5 rounded-md space-y-6">
        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Task Name</label>
            <input type="text" value="<?= $record['task_name'] ?>" name="task_name" placeholder="Enter the task name" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm"/>
            <p class="text-red-300 text-xs "><?= $errors['task_name'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Description</label>
            <input type="text" value="<?= $record['description'] ?>" name="description" placeholder="Enter the description" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm"/>
            <p class="text-red-300 text-xs "><?= $errors['description'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Due Date</label>
            <input type="date"  value="<?= $record['due_date'] ?>" name="due_date" placeholder="Enter the due_date here" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm"/>
            <p class="text-red-300 text-xs "><?= $errors['due_date'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Priority</label>
            <select name="priority" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm">
                <option value="" class="bg-zinc-600 ">Please select a priority</option>
                <option value="High" class="bg-zinc-600 " <?= $record['priority']==='High'? 'selected': ''?>>High</option>
                <option value="Medium" class="bg-zinc-600 " <?= $record['priority']==='Medium'? 'selected': ''?>>Medium</option>
                <option value="Low" class="bg-zinc-600 " <?= $record['priority']==='Low'? 'selected': ''?>>Low</option>
            </select>
            <p class="text-red-300 text-xs "><?= $errors['priority'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Status</label>
            <select name="status" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm">
                <option value="" class="bg-zinc-600 ">Please select a status</option>
                <option value="Pending" class="bg-zinc-600 " <?= $record['status']==='Pending'? 'selected': ''?>>Pending</option>
                <option value="In Progress" class="bg-zinc-600 " <?= $record['status']==='In Progress'? 'selected': ''?>>In Progress</option>
                <option value="Completed" class="bg-zinc-600 " <?= $record['status']==='Completed'? 'selected': ''?>>Completed</option>
            </select>
            <p class="text-red-300 text-xs "><?= $errors['status'] ?? '' ?></p>
        </div>

        <input type="hidden" name="task_id" value="<?= $task_id ?>" />
        <div class="space-x-2">
            <button class="bg-green-100/10 px-3 py-2 rounded-md shadow-sm text-sm font-semibold uppercase hover:bg-green-300/30" type="submit">Update</button>
            <a href="/tasks" class=" px-3 py-2 rounded-md shadow-sm text-sm font-semibold uppercase hover:border-b hover:border-white/10" >Cancel</a>
        </div>

    </form>
    
    
</section>
<?php require "./templates/footer.php"; ?>