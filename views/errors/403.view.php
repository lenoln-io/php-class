<?php
$dir = __DIR__.'/../partials';

require "{$dir}/head.php";
require "{$dir}/navbar.php";

?>
<main>
    <h1 class="text-2xl my-[24px] text-center font-bold"><?= "Code $code | You're not authorized!" ?></h1>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-center">
        <a href="/" class="underline">Take me back home!</a>
    </div>
</main>

<?php require "{$dir}/foot.php" ?>
