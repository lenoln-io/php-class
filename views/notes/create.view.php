<div class="max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="post" class="flex flex-col" action="/notes">
        <label for="body_note" class="mb-2">Description:</label>

        <textarea id="body_note" name="body_note" placeholder="Write here your new note..."
                  class="border border-2 rounded p-2"
                  rows="5"><?= $_POST['body_note'] ?? '' ?></textarea>
        <?php if (isset($errors['error'])) : ?>
            <p class="text-sm text-red-500 mt-2"><?= $errors['error'] ?></p>
        <?php endif; ?>

        <div class="max-w-7xl flex justify-end">
            <a href="/notes"
               class="w-max border border-gray-400 bg-gray-600 px-4 py-2 rounded-lg text-white font-bold mt-8 mr-4 hover:border-red-400 hover:bg-red-600">
                Cancelar
            </a>

            <?php if (isset($_POST['__method'])): ?>
                <button type="submit" value="PATCH" name="__method"
                        class="w-max border border-emerald-400 px-4 py-2 rounded-lg bg-emerald-600 text-white font-bold mt-8">
                    <input type="hidden" name="id" value="<?= $note->getId() ?>">
                    Atualizar
                </button>
            <?php else : ?>
                <button type="submit"
                        class="w-max border border-emerald-400 px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold mt-8">
                    Salvar
                </button>
            <?php endif; ?>
        </div>
    </form>
</div>
