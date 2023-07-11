<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Profile</h2>
        <?php if (isset($successMessage)) : ?>
            <p class="text-green-500"><?= $successMessage ?></p>
        <?php endif; ?>

        <div class="mb-4">
            <strong>Hanlde:</strong> <?= htmlspecialchars($user['username']) ?>
        </div>

        <div class="mb-4">
            <strong>Email:</strong> <?= htmlspecialchars($user['email']) ?>
        </div>

        <div class="mb-4">
            <strong>Joined:</strong> <?= $user['created_at'] ?>
        </div>

        <p class="mt-6">
            <a href="/profile/change-email" class="text-blue-500 hover:underline">Change Email</a>
        </p>

        <p>
            <a href="/profile/change-password" class="text-blue-500 hover:underline">Change Password</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
