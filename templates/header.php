<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/output.css" rel="stylesheet">
</head>
<body class="bg-zinc-900 text-white min-h-screen  ">
    <nav class="bg-white/10 text-white px-4 flex justify-between">
        <div class="">
            <a  class="px-4 py-4 inline-block hover:opacity-70 font-bold">Task Master</a>
            <?php if ($_SESSION["username"] !== "") { ?>
            <span class="text-xs text-gray-400">Welcome <?= $_SESSION["username"] ?></span>
            <?php } ?>
        </div>
        
        <div class="flex gap-2 items-center">
            <?php if ($_SESSION["user_id"] !== "") { ?>
            <a href="/tasks" class="px-4 py-4 inline-block hover:opacity-70">Tasks</a>
            <?php } ?>
            <?php echo $_SESSION["access"] == "admin" ? '<a href="/users" class="px-4 py-4 inline-block hover:opacity-70">User</a>': ''; ?>
            <?php if ($_SESSION["user_id"] === "") { ?>
                <a href="/register" class="px-4 py-4 inline-block hover:opacity-70">Register</a>
                <a href="/login" class="px-4 py-4 inline-block hover:opacity-70">Login</a>
            <?php } else { ?>
            <form action="/logout" method="POST">
                <button type="submit" class="px-4 py-4 inline-block hover:opacity-70">Logout</button>
            </form>
            <?php } ?>
        </div>
    </nav>
    <main class="max-w-3xl w-full mx-auto h-full  ">