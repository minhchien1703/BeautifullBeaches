<!DOCTYPE html>
<html lang="en">

<body>
    <?php $beach = $data['beach'];
    $image = $data['image'][0];
    $map = $data['map'][0];
    $slideimgs = $data['slideimgs'];
    $middleimg = $data['middleimg'][0];
    $traits = $data['traits'];
    $infos = $data['infos'];
    $flights = $data['flights'];
    $weathers = $data['weathers'];
    $totalReviews = $data['totalReviews'];
    $averageRating = $data['averageRating'];
    $percent1Star = $data['percent1Star'];
    $percent2Star = $data['percent2Star'];
    $percent3Star = $data['percent3Star'];
    $percent4Star = $data['percent4Star'];
    $percent5Star = $data['percent5Star'];
    $beach_id = $data['beach_id'];
    $reviews = $data['reviews'];
    ?>
    <div id="details-overlay" onclick="closeReviewForm(), closeReviewComment(), off()"></div>
    <div class="c-12 details-container-img">
        <img class=" details-big-img" src="<?= $image['picture_link'] ?>" alt="">
    </div>

    <main class="details-main">
        <div class="details-beach-container">
            <div class="details-beach-header details-padding">
                <p class="details-header-title header-p"><?= $beach['name'] ?></p>
                <p class="details-header-subtitle header-p"><?= $beach['country_name'] ?></p>
                <p class="details-beach-icon">
                    <img style="width: 35px;" src="/beautifulbeaches/app/asset/image/icon.png" alt="">
                </p>
            </div>

            <!-- section beach -->
            <div class="details-beach-body details-padding">
                <div class="details-beach-about">
                    <p class="details-beach-tilte"><?= $beach['description_title'] ?></p>
                    <p class="details-beach-text">
                        <?= $beach['description'] ?>
                    </p>
                    
                </div>
                <div class="details-beach-img">
                    <img style="width: 100%;height: 100%;" src="<?= $map['picture_link'] ?>" alt="">
                </div>
            </div>
            <!-- section images -->
            <div class="details-images">
                <div class="details-images">
                    <?php foreach ($slideimgs as $slideimg): ?>
                        <div class="details-images-item">
                            <img style="width: 100%;height: 100%;" src="<?= $slideimg['picture_link'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- section pluses -->
            <div class="details-padding">
                <div class="details-pluses">
                    <?php foreach ($traits as $trait): ?>
                        <div class="details-pluses-item">
                            <div class="details-pluses-img">
                                <img class="details-img" src="<?= $trait['trait_img'] ?>" alt="">
                            </div>
                            <div class="details-pluses-info">
                                <p class="details-pluses-title"><?= $trait['trait_name'] ?></p>
                                <p class="details-pluses-text"><?= $trait['trait_description'] ?>

                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- section hotel -->
            <div class="details-hotel">
                <div class="details-img-bg">
                    <img style="width: 100%;height: 100%;object-fit: cover;" src="<?= $middleimg['picture_link'] ?>"
                        alt="">
                </div>
            </div>
            <div class="details-container-more">
                <div class="details-more">
                    <div class="details-more-item">
                        <p class="details-more-title"><?= $beach['name'] ?> WEATHER AVERAGES</p>
                        <table class="details-more-table">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>avg. high</td>
                                    <td>avg. low</td>
                                    <td>rainy days</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($weathers as $weather): ?>
                                    <tr>

                                        <td class="details-table-month"><?= $weather['month_name'] ?></td>
                                        <td>
                                            <span><?= $weather['avg_high'] ?></span>
                                            °
                                        </td>
                                        <td>
                                            <span><?= $weather['avg_low'] ?></span>
                                            °
                                        </td>
                                        <td><?= $weather['rainy_days'] ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a style="object-fit: cover;display: flex;justify-content: right;" href="/beautifulbeaches/details/downloadPDF?id=<?php echo $beach['id']; ?></a>">
                            <span style="font-size: 12.5px;text-transform: uppercase;color: #000;">Download as PDF</span>
                            <img style="width: 15px;height: 15px;margin-left: 5px;"
                                src="/beautifulbeaches/app/asset/image/link-icon-black.svg" alt="">
                        </a>
                    </div>
                    <div class="details-more-item more-item-right">
                        <div class="details-right-info">
                            <p class="details-more-title-right">THE PERFECT DAY AT <?= $beach['name'] ?></p>
                            <ul class="details-list-info">
                                <?php foreach ($infos as $info): ?>
                                    <li>
                                        <p style="font-size: 13.5px;font-weight: bolder;"><?= $info['more_info_name'] ?></p>
                                        <p style="font-size: 12.5px;"><?= $info['more_info_content'] ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- review -->
            <div class="details-review">
                <div class="details-review-container">
                    <div class="details-review-left">
                        <p style="font-size: 30px;font-weight: bolder;">Ratings & Reviews</p>
                        <div class="details-review-rating">
                            <div class="details-rating-left">
                                <p style="font-size: 90px;font-weight: bolder;color: gray;"><?= $averageRating ?></p>
                                <p style="font-size: 20px;color: gray;font-weight: bolder;">Out of 5</p>
                            </div>
                            <div class="details-rating-right">
                                <div class="details-rating-star">
                                    <div
                                        style="width: 100%;display: flex;height: 19px;align-items: center;padding: 5px 0;">
                                        <span style="width: 50%;text-align:right;">
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                        </span>
                                        <div class="rating-crossbar">
                                            <p style="width: <?= $percent5Star ?>%;" id="crossbar-percent"></p>
                                        </div>
                                    </div>
                                    <div
                                        style="width: 100%;display: flex;height: 19px;align-items: center;padding: 5px 0;">
                                        <span style="width: 50%;text-align:right;">
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                        </span>
                                        <div class="rating-crossbar">
                                            <p style="width: <?= $percent4Star ?>%;" id="crossbar-percent"></p>
                                        </div>
                                    </div>
                                    <div
                                        style="width: 100%;display: flex;height: 19px;align-items: center;padding: 5px 0;">
                                        <span style="width: 50%;text-align:right;">
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                        </span>
                                        <div class="rating-crossbar">
                                            <p style="width: <?= $percent3Star ?>%;" id="crossbar-percent"></p>
                                        </div>
                                    </div>
                                    <div
                                        style="width: 100%;display: flex;height: 19px;align-items: center;padding: 5px 0;">
                                        <span style="width: 50%;text-align:right;">
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                        </span>
                                        <div class="rating-crossbar">
                                            <p style="width: <?= $percent2Star ?>%;" id="crossbar-percent"></p>
                                        </div>
                                    </div>
                                    <div
                                        style="width: 100%;display: flex;height: 19px;align-items: center;padding: 5px 0;">
                                        <span style="width: 50%;text-align:right;">
                                            <i style="font-size: 10px;color: gray;" class="fa-solid fa-star"></i>
                                        </span>
                                        <div class="rating-crossbar">
                                            <p style="width: <?= $percent1Star ?>%;" id="crossbar-percent"></p>
                                        </div>
                                    </div>
                                </div>
                                <p
                                    style="width: 100%;color: gray;margin-top: 5px;font-weight: bolder;text-align: right;">
                                    <?= $totalReviews ?> Ratings
                                </p>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button class="review-button" onclick="openReviewForm(), on()">Add Review</button>
                        </div>
                    </div>
                    <div class="details-review-right">
                        <button class="details-seeall-review" onclick="openReviewComment(), on()">See All</button>
                        <div class="details-review-comment">
                            <div style="width: 100%;text-align:left;padding: 5px;">
                                <?php if (!empty($reviews)): ?>
                                    <?php $item = array_slice($reviews, 0, 3) ?>
                                    <?php foreach ($item as $review): ?>
                                        <div class="details-review-object">
                                            <p>
                                            <span style="font-weight: bold;"><?= $review['reviewer_name'] ?>
                                            </span>
                                            </p>
                                            <span style="margin-top: 5px;"><?= $review['review_comments'] ?></span>
                                            <span style="margin-left: 5px;">
                                                <?php for ($i = 1; $i <= $review['rating']; $i++) {
                                                    echo "<i style='font-size: 10px;color: orange;' class='fa-solid fa-star'></i>";
                                                } ?>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No Comment!</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ReviewAll -->
    <div id="openreviewcomment">
        <button class="close-button" onclick="closeReviewComment(), off()">×</button>
        <h2>Comment All</h2>
        <div class="details-review-comment">
            <div style="width: 100%;text-align: left;">
                <?php if (!empty($reviews)): ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="details-review-object">
                            <span>

                            <span style="font-weight: bold;"><?= $review['reviewer_name'] ?>:
                    </br>
                            </span>


                            </span>
                            <span style="margin-top: 5px;"><?= $review['review_comments'] ?></span>
                            <span style="margin-left: 5px; ">
                                <?php for ($i = 1; $i <= $review['rating']; $i++) {
                                    echo "<i style='font-size: 10px;color: orange;' class='fa-solid fa-star'></i>";
                                } ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No Comment!</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- Review form container -->
    <div class="review-form-container" id="reviewForm">
        <button class="close-button" onclick="closeReviewForm(), off()">×</button>
        <h2>Write a review / comment</h2>
        <p>* Required fields</p>
        <p>Rating (out of 5)*:</p>
        <p>Just give a star rating or feel free to add a comment too...</p>
        <form action="http://localhost/beautifulbeaches/details/saveReviews/<?= $beach_id ?>" method="POST"
            onsubmit="validateForm(event)">
            <!-- Star rating -->
            <span class="star-rating" id="starRating">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </span><br>
            <input type="hidden" id="starValue" name="starValue">
            <label for="name">Your name (optional):</label><br>
            <input class="name-form-review" type="text" id="name" name="name"><br><br>
            <label for="comments">Review comments (optional):</label>
            <textarea class="comment-form-review" id="comments" name="comments"></textarea><br><br>
            <button onclick="closeReviewForm(), off()" class="rating-form-btn-submit" type="submit">
                Submit
            </button>
        </form>
    </div>
            <!-- Flight information section-->
            <div class="details-container-more">
                <div class="details-more">
                    <div class="details-more-item more-item-right"  style="width:100%">
                            <div class="details-right-info">
                            <p class="details-more-title">FLIGHTS TO <?= $beach['name'] ?></p>
                            <table class="details-more-table">
                                            <thead>
                                                <tr>
                                                    <td style="font-weight:bolder">FROM</td>
                                                    <td style="font-weight:bolder">TO</td>
                                                    <td style="font-weight:bolder">DEPARTURE TIME</td>
                                                    <td style="font-weight:bolder">ARRIVAL TIME</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  foreach ($flights as $flight) {
                                                    echo '<tr>
                                                    <td class="details-table-month">'.$flight["from"].'</td>
                                                    <td>
                                                        <span>'.$flight["to"].'</span>             
                                                    </td>
                                                    <td>
                                                        <span>'.$flight["depart_date"].'</span>
                                                    </td>
                                                    <td>'.$flight["arrive_date"].'</td>
                                                </tr>';
                                                }
                                                ?>

                                            </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3687ed1fbf.js" crossorigin="anonymous"></script>
    <script src="http://localhost/beautifulbeaches/app/asset/details.js"></script>
</body>

</html>