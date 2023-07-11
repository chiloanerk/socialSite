<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-4">Logged in as: <?= htmlspecialchars($user['alias']) ?></p>

            <!-- Form fields and submit button here -->
            <form action="/profile/update-password" method="POST">
                <div class="mb-4">
                    <label for="current_password" class="block font-medium">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-input rounded-md">
                    <?php if (isset($errors['current_password'])) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['current_password'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label for="new_password" class="block font-medium">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-input rounded-md">
                    <?php if (isset($errors['new_password'])) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['new_password'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block font-medium">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-input rounded-md">
                    <?php if (isset($errors['confirm_password'])) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['confirm_password'] ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn-primary py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-gray-300 font-bold rounded-xl transition duration-200">Change Password</button>
            </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
