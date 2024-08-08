
<?php require "./templates/header.php"; ?>
<?php $data = User::fetch_all(); ?>
<section>
    <div class="flex items-center gap-4 mb-6 mt-12">
        <h1 class="text-2xl font-bold">Users</h1>
        <a class=" bg-navy-800 hover:opacity-70 uppercase text-xs tracking-wider underline underline-offset-8 inline-block" href="/users/create">New User</a>
    </div>

    <table class="w-full border border-white/10 rounded-md">
        <thead class="bg-white/5">
            <tr>
                <th class="px-3 py-2 text-sm font-bold text-left">Id</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Name</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Password</th>
                <th class="px-3 py-2 text-sm font-bold text-left">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr class="border-b border-white/10">
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['user_id'] ?></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><a href="/user/show?id=<?= $row['user_id'] ?>"><?= $row['username']??'No name' ?></a></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['password'] ?></td>
                    <td class="px-3 py-4 text-sm text-gray-300"><?= $row['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</section>
<?php require "./templates/footer.php"; ?>
