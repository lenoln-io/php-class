<?php
$dir = __DIR__.'/../partials';

require "{$dir}/head.php";
require "{$dir}/navbar.php";
require "{$dir}/header.php";

?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <a href="/note/?id=<?= $note['id']; ?>">
              <li class="underline text-blue-500">
                 <?=
                        $note['body_note'];
                  ?>
              </li>
            </a>
        <?php endforeach; ?>
    </div>
</main>
<?php require "{$dir}/foot.php" ?>


<!--
C reate - INSERT INTO
R ead - SELECT FROM
U pdate - UPDATE VALUES
D elete - DELETE FROM
-->