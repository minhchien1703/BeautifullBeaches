<!DOCTYPE html>
<?php
    $zones = $data['zones'];
    $beaches = $data['beaches'];
?>
<html lang="en">
<body>
    <main class="main-content">
        <section class="section-destination">
            <div class="container">
                <h2>SITEMAP</h2>
                <h3>
                If you're looking for something in particular, check out the full list of pages on our website below.
                </h3>
                <p class="footer-title">ABOUT</p>
                <ul class="footer-list">
                    <li><a href="/beautifulbeaches/home/index">Home page</a></li>
                    <li><a href="/beautifulbeaches/gallery/index">Gallery</a></li>
                    <li><a href="/beautifulbeaches/aboutus/index">About Us</a></li>
                    <li><a href="/beautifulbeaches/contactus/index">Contact Us</a></li>
                    <li><a href="/beautifulbeaches/faq/index">FAQ</a></li>
                </ul>
                </br>
                <p class="footer-title">BEST BEACHES LISTS</p>
                <ul class="footer-list">
                <?php foreach ($zones as $zone): ?>
                    <li><a href="http://localhost/beautifulbeaches/toplist/index?id=<?= $zone['zone_id']; ?>">The <?= $zone['zone_name']; ?>'s Best 2024</a></li>
                <?php endforeach; ?>
                    <li><a href="/beautifulbeaches/best/index">Best of the Best</a></li>
                </ul>
                </br>
                <p class="footer-title">BEACHES</p>
                <ul class="footer-list">
                <?php foreach ($beaches as $beach): ?>
                    <li><a href="http://localhost/beautifulbeaches/details/index?id=<?= $beach['id']; ?>"><?= $beach['name']; ?></a></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
</body>
</html>