
<?php
$task_id = $_GET['id'];
$record = Task::fetch_single($task_id);
?>



<?php require "./templates/header.php"; ?>
<section>
    <div class="flex items-center gap-4 mb-6 mt-12">
        <h1 class="text-2xl font-bold">Task Data - <?= $record['task_name'] ?></h1>
        <a class="text-gray-300 font-bold text-sm border border-gray-100 px-2 py-1 hover:opacity-70" href="/task/edit?id=<?= $record['task_id'] ?>">Edit this Task</a>
        <a class="text-gray-300 font-bold text-sm underline" href="/tasks">Back to listing</a>
    </div>
    <?php //dd($record); ?>
    <div>
        <table class="text-gray-300">
            <tr>
                <td class="w-32 px-3 py-2 font-semibold">Task Id</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['task_id'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Task Name</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['task_name'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Due Date</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['due_date'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Priority</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['priority'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Status</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['status'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Description</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['description'] ?></td>
            </tr>
        </table>
    </div>
</section>

<section class="mt-16 bg-white/5 p-8 rounded-md border-white/10 border">
    <p class="font-semibold text-gray-100 text-lg mb-3">Delete Task?</p>
    <p class="text-gray-300 text-sm mb-8">Record once deleted cannot be accessed again. </p>
    <form method="POST" action="/task/delete">
        <input type="hidden" name="task_id" value="<?= $record['task_id'] ?>" />
        <button class="text-red-300 text-sm font-bold">Yes, please delete</button>
    </form>
</section>
<?php require "./templates/footer.php"; ?>