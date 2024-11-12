<form method="post" class="flex flex-col">
    <label for="body_note" class="mb-2">Description:</label>

    <textarea id="body_note" name="body_note" placeholder="Write here your new note..."
              class="border border-2 rounded p-2"
              rows="5"><?= $_POST['body_note'] ?? '' ?></textarea>
    <?php if (isset($errors['error'])) : ?>
        <p class="text-sm text-red-500 mt-2"><?= $errors['error'] ?></p>
    <?php endif; ?>

    <div class="max-w-7xl flex justify-end">
        <button type="submit"
                class="w-max border border-indigo-400 px-4 py-2 rounded-lg bg-indigo-600 text-white font-bold mt-8">
            Salvar
        </button>
    </div>
</form>


