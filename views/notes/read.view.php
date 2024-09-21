<?php
$dir = __DIR__ . '/../partials';

require "{$dir}/head.php";
require "{$dir}/navbar.php";
require "{$dir}/header.php";

?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="text-[18px] font-medium">
            <?=
            htmlspecialchars($note['body_note']);
            ?>
        </p>
    </div>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="border border-indigo-400 px-4 py-2 rounded-lg bg-indigo-600 text-white font-bold">Go
            back</a>
    </div>
</main>
<?php require "{$dir}/foot.php" ?>
