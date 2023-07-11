<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- HTML markup for the shareable link page -->
        <p>Share this link with others:</p>
        <p>Click on the Copy button and paste it to your social network</p>
        <input type="text" value="<?= $shareableLink ?>" id="copyText" readonly>
        <button onclick="myFunction()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Copy text</button>
    </div>
    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("copyText");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    </script>
</main>

<?php require base_path('views/partials/footer.php') ?>
