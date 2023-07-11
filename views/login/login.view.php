<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
    <main>
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <?php
                // Check if logout message exists and display it
                if (isset($_GET['logout']) && $_GET['logout'] == 1 && isset($_SESSION['logout_message'])) {
                    echo '<div class="text-red-500 text-center">';
                    echo $_SESSION['logout_message'];
                    echo '</div>';
                    unset($_SESSION['logout_message']); // Clear the message
                }
                ?>
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login to existing account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/login" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" value="<?= isset($values['email']) ? htmlspecialchars($values['email']) : '' ?>" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                            <?php if (isset($errors['email'])) : ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" value="<?= isset($values['password']) ? htmlspecialchars($values['password']) : '' ?>" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <?php if (isset($errors['password'])) : ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
                    </div>
                </form>
            </div>
            <div class="mt-4 text-center">
                <p>Don't have an account? <a href="/register" class="text-indigo-600 hover:text-indigo-500">Register here</a>.</p>
            </div>
        </div>

    </main>
<?php require base_path('views/partials/footer.php') ?>