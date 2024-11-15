<div class="m-auto flex flex-col justify-center">
    <div class="border-2 rounded-md w-[424px] shadow-xl">
        <div> <!--class="sm:mx-auto sm:w-full sm:max-w-sm"-->
            <h2 class="border-b-2 py-5 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register</h2>
        </div>

        <div class="pt-[24px] px-[32px] pb-[32px]">
            <form class="space-y-6" action="/register" method="POST">
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value="<?= $_POST['name'] ?? '' ?>" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                    <?php if (isset($errors['name'])) : ?>
                        <p class="text-sm text-red-500 mt-2"><?= $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="<?= $_POST['email'] ?? '' ?>" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                    <?php if (isset($errors['email'])) : ?>
                        <p class="text-sm text-red-500 mt-2"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                    <?php if (isset($errors['password'])) : ?>
                        <p class="text-sm text-red-500 mt-2"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</div>