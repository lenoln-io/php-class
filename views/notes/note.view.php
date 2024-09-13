<?php
$dir = __DIR__.'/../partials';

require "{$dir}/head.php";
require "{$dir}/navbar.php";
require "{$dir}/header.php";

?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p class="text-[24px] bolder mb-4">
                <?=
                $note['body_note'];
                ?>
            </p>
            <a href="/notes" class="underline text-blue-500">Go back</a>
        </div>
    </main>
<?php require "{$dir}/foot.php" ?>