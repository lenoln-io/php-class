<?php

require base_path("views/partials/head.php");
require base_path("views/partials/navbar.php");

?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $title ?></h1>
            <a href="/note/new"
               class="border border-indigo-400 bg-indigo-600 px-4 py-2 rounded-lg text-white font-bold hover:bg-indigo-800">
                Create a new note
            </a>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-indigo-200">
                <thead class="bg-indigo-600">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-md text-white font-bold tracking-wider w-4/5">
                        Anotação
                    </th>
                    <th scope="col" class="px-9 py-3 text-left text-md text-white font-bold tracking-wider">
                        Ações
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($notes as $note) : ?>
                    <tr>
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="text-md text-gray-900">
                                <?=
                                htmlspecialchars($note['body_note']);
                                ?>
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap flex items-center" data-id="10">
                           <form method="post">
                                <a href="/note?id=<?= $note['id']; ?>"
                                   class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-md font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-[16px] w-10">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="h-4 w-4"
                                    >
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <span class="sr-only">Visualizar</span>
                                </a>
                                <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-[16px] w-10"
                                   data-id="12">
                                    <svg data-id="13" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v10"></path>
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                        <path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"></path>
                                    </svg>
                                    <span class="sr-only" data-id="14">Editar</span>
                                </a>
                                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-[16px] w-10"
                                   data-id="15">
                                    <svg data-id="16" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M3 6h18"></path>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                        <line x1="10" x2="10" y1="11" y2="17"></line>
                                        <line x1="14" x2="14" y1="11" y2="17"></line>
                                    </svg>
                                    <span class="sr-only" data-id="17">Excluir</span>
                                </button>
                           </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php require base_path("views/partials/foot.php") ?>


<!--
C reate.view.php - INSERT INTO
    Store.php
        index.php
R ead.php - SELECT FROM
    read.view.php
U pdate (edit.view.php) - UPDATE VALUES
    U pdate.php
        index.php
D etroy.php - DELETE FROM
    index.php
-->