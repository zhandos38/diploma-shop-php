<?php
/** @var \common\models\ProductImage $images[] */
/** @var \common\models\ProductImage $image */
/** @var string $videoUrl */
?>
<?php if ($images): ?>
<div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
     data-infinite="true"
     data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
     data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
     data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
     data-nav-for="#sliderSyncingThumb">
    <?php if (!empty($videoUrl)): ?>
    <div class="js-slide">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $videoUrl ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <?php endif; ?>
    <?php foreach ($images as $image): ?>
    <div class="js-slide">
        <img class="img-fluid" src="<?= $image->getImgPath() ?>" alt="Image Description">
    </div>
    <?php endforeach; ?>
</div>

<div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
     data-infinite="true"
     data-slides-show="5"
     data-is-thumbs="true"
     data-nav-for="#sliderSyncingNav">
    <?php if (!empty($videoUrl)): ?>
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="https://img.youtube.com/vi/<?= $videoUrl ?>/default.jpg" alt="Image Description">
    </div>
    <?php endif; ?>
    <?php foreach ($images as $image): ?>
    <div class="js-slide" style="cursor: pointer;">
        <img class="img-fluid" src="<?= $image->getImgPath() ?>" alt="Image Description">
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
    <img class="img-fluid w-100" src="/images/no-image.jpg" alt="No photo">
<?php endif; ?>