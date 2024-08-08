<?php 
    $record = [];
    $user_id = $_GET["id"];
    $record = User::fetch_single($user_id);
    $errors = [];
?>


<?php require "./templates/header.php"; ?>
<section class="py-8">
    <div class="flex items-center gap-4 mb-4">
        <h1 class="text-2xl text-gray-100 font-semibold">Edit User - <?= $record['username'] ?></h1>
        
    </div>

    <form method="POST" action="/user/edit" class="w-full py-8 px-12 bg-white/5 border border-green-100/5 rounded-md space-y-6">
        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">User Name</label>
            <input type="text" value="<?= $record['username'] ?>" name="username" placeholder="Enter the username" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm"/>
            <p class="text-red-300 text-xs "><?= $errors['username'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Email</label>
            <input type="email"  value="<?= $record['email'] ?>" name="email" placeholder="Enter the email here" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm"/>
            <p class="text-red-300 text-xs "><?= $errors['email'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm font-semibold text-gray-300 mb-2 inline-block">Password</label>
            <input type="password"  value="<?= $record['password'] ?>" name="password" placeholder="Enter the password here" class="border border-green-100/5 bg-white/10  shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm"/>
            <p class="text-red-300 text-xs "><?= $errors['password'] ?? '' ?></p>
        </div>

        <div>
            <input type="hidden" name="user_id" value="<?= $user_id ?>" />
            <button class="bg-green-100/10 px-3 py-2 rounded-md shadow-sm text-sm font-semibold uppercase hover:bg-green-300/30" type="submit">Update</button>
        </div>

    </form>
    
    
</section>
<?php require "./templates/footer.php"; ?>