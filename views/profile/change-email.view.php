<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Change Email</h1>

        <p>Current email: <?= $user['email'] ?></p>

        <!-- Form fields and submit button here -->
        <form action="/profile/update-email" method="POST">
            <div class="mb-4">
                <label for="new_email" class="block font-medium">New Email</label>
                <input type="email" id="new_email" name="new_email" class="form-input">
                <?php if (isset($errors['email'])) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="confirm_email" class="block font-medium">Confirm New Email</label>
                <input type="email" id="confirm_email" name="confirm_email" class="form-input">
                <?php if (isset($errors['confirmEmail'])) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['confirmEmail'] ?></p>
                <?php endif; ?>
            </div>
            <?php if (isset($errors['email']) && !isset($errors['confirmEmail'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
            <?php endif; ?>
            <button type="submit" class="btn-primary">Change Email</button>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
