<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/output.css" rel="stylesheet">
</head>
<body class="bg-zinc-900 text-white">
    <nav class="bg-white/10 text-white px-4 flex justify-between">
        <div class="">
            <a href="/tasks" class="px-4 py-4 inline-block hover:opacity-70 font-bold">Task Master</a>
            <span class="text-xs text-gray-400">Welcome <?= $_SESSION["username"] ?></span>
            <!-- <span>Userid <?= $_SESSION["user_id"] ?></span> -->
        </div>
        
        <div class="flex gap-2 items-center">
            <a href="/tasks" class="px-4 py-4 inline-block hover:opacity-70">Tasks</a>
            <?php echo $_SESSION["access"] == "admin" ? '<a href="/users" class="px-4 py-4 inline-block hover:opacity-70">User</a>': ''; ?>
            <form action="/logout" method="POST">
                <button type="submit" class="px-4 py-4 inline-block hover:opacity-70">Logout</button>
            </form>
        </div>
    </nav>
    <main class="max-w-3xl w-full mx-auto">