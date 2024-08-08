
<?php 
    if (!isset($record)) $record = [];
    if (!isset($errors)) $errors = [];
?>


<?php require "./templates/guest-header.php"; ?>
<section class="py-8">
        <h4 class="w-full text-center mb-5 uppercase tracking-widest text-gray-500 font-black">TaskMaster</h4>
        <h1 class="text-4xl text-gray-100  text-center uppercase w-full mb-6">Login</h1>

    <form method="POST"  action="/login" class="w-full py-8 px-6  border border-green-100/5 space-y-6 rounded-md">

        <div>
            <label class="text-sm text-gray-500 font-semibold mb-2 inline-block">Email</label>
            <input type="email" value="<?= $record['email'] ?? '' ?>" name="email" placeholder="Enter the email here" class="border border-green-100/5 bg-white/10 shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm rounded-md"/>
            <p class="text-red-300 text-xs"><?= $errors['email'] ?? '' ?></p>
        </div>

        <div>
            <label class="text-sm text-gray-500 font-semibold mb-2 inline-block">Password</label>
            <input type="password" value="<?= $record['password'] ?? '' ?>" name="password" placeholder="Enter the password here" class="border border-green-100/5 bg-white/10 shadow-sm w-full px-3 py-2 focus:outline-none focus:border-white/30 text-sm rounded-md"/>
            <p class="text-red-300 text-xs"><?= $errors['password'] ?? '' ?></p>
        </div>

        <div class="space-x-2">
            <button class="bg-green-100/10 px-3 py-2 rounded-md shadow-sm text-sm font-semibold uppercase hover:bg-green-300/30" type="submit">Login</button>
        </div>

    </form>
    
    
</section>
<?php require "./templates/footer.php"; ?>