

<?php 
$user_id = $_SESSION["user_id"];

if ($user_id===1) {
    $data = Task::fetch_all(); 
} else {
    $data = Task::fetch_all_for_user($user_id);
}
?>



<?php require "./templates/header.php"; ?>
<section>
    <div class="flex items-center gap-4 mb-6 mt-12">
        <h1 class="text-2xl font-bold">Tasks</h1>
        <a class="bg-navy-800 hover:opacity-70 uppercase text-xs tracking-wider underline underline-offset-8 inline-block" href="/tasks/create">New Task</a>
    </div>

    <?php if (count($data) === 0) { ?>
        <p>You do not have any tasks assigned or created for you! <br/>Please click the New Task link to create a new task.</p>
    <?php } else { ?>
    <table class="w-full border border-white/10 rounded-md">
        <thead class="bg-white/5">
            <tr>
                <th class="px-3 py-2 text-sm font-bold text-left">Id</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Task Name</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Due Date</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Priority</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr class="border-b border-white/10">
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['task_id'] ?></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><a href="/task/show?id=<?= $row['task_id'] ?>"><?= $row['task_name']??'No name' ?></a></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['due_date'] ?></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['priority'] ?></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php } ?>
    
</section>
<?php require "./templates/footer.php"; ?>
