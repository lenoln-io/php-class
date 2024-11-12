<div class="m-auto flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="border-2 rounded-md w-[424px] shadow-xl">

        <h2 class="border-b-2 py-5 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in</h2>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                <?php if (isset($errors['notAuth'])) : ?>
                    <p class="text-red-500 text-sm">
                        <?= $errors['notAuth'] ?>
                    </p>
                <?php endif; ?>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 px-4 text-emerald-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 px-4 text-emerald-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>

            <p class="my-10 text-center text-sm/6 text-gray-500">
                Not a member?
                <a href="/register" class="font-semibold text-emerald-600 hover:text-emerald-500">Sign up</a>
            </p>
        </div>
    </div>
</div>