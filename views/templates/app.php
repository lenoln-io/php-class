<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aula</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-zinc-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="text-2xl text-emerald-600 font-bold">Logo</a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/" class="<?= pageStyle('/')  ?> rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                            <a href="/about" class="<?= pageStyle('/about') ?> rounded-md px-3 py-2 text-sm font-medium text-emerald-500 hover:bg-emerald-700 hover:text-white">About</a>
                            <a href="/contact" class="<?= pageStyle('/contact') ?> rounded-md px-3 py-2 text-sm font-medium text-emerald-500 hover:bg-emerald-700 hover:text-white">Contact</a>
                            <?php if(isset($_SESSION['auth'])) : ?>
                                <a href="/notes" class="<?= pageStyle('/notes') ?> rounded-md px-3 py-2 text-sm font-medium text-emerald-500 hover:bg-emerald-700 hover:text-white">Notes</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="relative ml-3">
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <div class="flex gap-2 items-center">
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                <div class="flex flex-col items-center">
                                    <p class="text-white text-sm">Bem vindo, <?php echo $_SESSION['auth']->getName(); ?></p>
                                    <form action="/logout" method="post">
                                        <input type="hidden" name="__method" value="DELETE">
                                        <button type="submit" class="rounded-md px-12 py-[2px] text-sm font-medium text-white bg-emerald-700 hover:bg-emerald-500 hover:text-white">Logout</button>
                                    </form>
                                </div>
                            </div>
                        <?php else : ?>
                            <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-emerald-950 bg-emerald-700 hover:bg-emerald-500 hover:text-white">Sign in</a> <span class="text-white">or</span>
                            <a href="/register" class="rounded-md px-3 py-2 text-sm font-medium text-emerald-950 bg-emerald-700 hover:bg-emerald-500 hover:text-white">Sign up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="mx-auto max-w-7xl h-[calc(100vh-64px)] grid px-4 py-6 sm:px-6 lg:px-8">
            <?php require base_path("views/$view.view.php") ?>
        </div>
    </main>
</div>

</body>
</html>