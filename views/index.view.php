<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<section class="bg-gray-100 dark:bg-gray-900 h-screen">
    <div class="flex h-full">
        <div class="bg-gray-200 w-1/5 border-r border-gray-300">
            <ul>
                <li>Home</li>
                <li>Discover</li>
                <li>Notifications</li>
                <li>Messages</li>
                <li>Profile</li>
                <li>Settings</li>
            </ul>
        </div>
        <div class="bg-white overflow-y-auto flex-1 border-r border-l border-gray-300">
            <div class="p-4">
                <textarea class="w-full h-32 border border-gray-300 rounded-lg px-4 py-2 resize-none" placeholder="What's on your mind?"></textarea>
                <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Post</button>
            </div>

            <!-- Mock Post -->
            <div class="p-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="text-gray-700">Username</p>
                    <p class="text-gray-900 mt-2">Most twitter celebs are also building from the scratch here too but they'll use the same tactics to gain followers here, persuade you to follow them for a follow back but they won't.</p>
                </div>
            </div>

            <!-- Mock Post -->
            <div class="p-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="text-gray-700">Username</p>
                    <p class="text-gray-900 mt-2">😭😭Hayi wena asizelanga lokho la</p>
                </div>
            </div>

            <!-- Mock Post -->
            <div class="p-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="text-gray-700">Username</p>
                    <p class="text-gray-900 mt-2">Nothing more annoying than a “wyd” text from the wrong person.</p>
                </div>
            </div>

            <!-- Mock Post -->
            <div class="p-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="text-gray-700">Username</p>
                    <p class="text-gray-900 mt-2">😭Guys I have a very serious question...how do y'all overcome the trauma of hearing your parents busy at it during the night?</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-200 w-1/5 border-l border-gray-300">
            <ul>
                <li>Trends</li>
                <li>Who to follow</li>
                <li>Site Updates</li>
            </ul>
        </div>
    </div>
</section>




<?php require base_path('views/partials/footer.php') ?>
