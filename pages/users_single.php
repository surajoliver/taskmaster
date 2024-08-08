
<?php
$user_id = $_GET['id'];
?>

<?php require "./templates/header.php"; ?>
<?php $record = User::fetch_single($user_id); ?>
<section>
    <div class="flex items-center gap-4 mb-6 mt-12">
        <h1 class="text-2xl font-bold">User Data - <?= $record['username'] ?></h1>
        <a class="text-gray-300 font-bold text-sm underline" href="/user/edit?id=<?= $record['user_id'] ?>">Edit this User</a>
    </div>
    <?php //dd($record); ?>
    <div>
        <table class="text-gray-300">
            <tr>
                <td class="w-32 px-3 py-2 font-semibold">User Id</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['user_id'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">User Name</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['username'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Email</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['email'] ?></td>
            </tr>
            <tr>
                <td class="px-3 py-2 font-semibold">Password</td>
                <td class="px-3 py-2 text-gray-300"><?= $record['password'] ?></td>
            </tr>
        </table>
    </div>
</section>

<section class="mt-16 bg-white/5 p-8 rounded-md border-white/10 border">
    <p class="font-semibold text-gray-100 text-lg mb-3">Delete User?</p>
    <p class="text-gray-300 text-sm mb-8">Record once deleted cannot be accessed again. </p>
    <form method="POST" action="/user/delete">
        <input type="hidden" name="user_id" value="<?= $record['user_id'] ?>" />
        <button class="text-red-300 text-sm font-bold">Yes, please delete</button>
    </form>
</section>
<?php require "./templates/footer.php"; ?>