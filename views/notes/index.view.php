<main x-data="{
    openModal: false,
    currentNote: null,
    showNote(note) {
        this.currentNote = note;
        this.openModal = true;
    }
}">
    <div class="mx-auto max-w-7xl">
        <div class="flex justify-between items-center mb-4">
            <span></span>
            <a href="/note/new"
               class="border border-emerald-400 bg-emerald-600 px-4 py-2 rounded-lg text-white font-bold hover:bg-emerald-800">
                Create a new note
            </a>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-emerald-200">
                <thead class="bg-emerald-600">
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
                                <?php
                                $data = [
                                    'id' => $note->getId(),
                                    'body_note' => $note->getBodyNote(),
                                    'user_id' => $note->getUserId()
                                ];

                                $maxLength = 100;
                                $text = htmlspecialchars($note->getBodyNote());
                                if (strlen($text) > $maxLength) {
                                    echo substr($text, 0, $maxLength) . '...';
                                } else {
                                    echo $text;
                                }
                                ?>
                            </div>
                        </td>
                        <td class="px-6 py-2 whitespace-nowrap flex items-center" data-id="10">
                            <button
                                    @click="showNote(<?=  htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8') ?>)"
                                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-md font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-[16px] w-10"
                            >
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
                            </button>
                            <form method="post">
                                <button formaction="/note/edit" value="GET" name="__method"
                                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-[16px] w-10"
                                        data-id="12">
                                    <svg data-id="13" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v10"></path>
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                                        <path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"></path>
                                    </svg>
                                    <span class="sr-only" data-id="14">Editar</span>
                                </button>
                                <button name="__method" formaction="/notes" value="DELETE"
                                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-[16px] w-10"
                                        data-id="15">
                                    <input type="hidden" name="id" value="<?= $note->getId() ?>">
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
    <!---                 MODAL                    -->
    <div
            x-show="openModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
    >
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div
                    x-show="openModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"
                    @click="openModal = false"
            ></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                    x-show="openModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            >
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 text-gray-500 font-bold" id="modal-title">
                                Detalhes da Anotação
                            </h3>
                            <div class="mt-2">
                                <p class="text-2xl" x-text="currentNote?.body_note || 'Nenhuma anotação'"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-emerald-600 text-base font-medium text-white hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 sm:ml-3 sm:w-auto sm:text-sm"
                            @click="openModal = false"
                    >
                        Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>


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