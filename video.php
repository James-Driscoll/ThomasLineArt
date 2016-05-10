<?php
$vimeo_embed = get_field('vimeo_video_embed', false, false);
$video_camera = get_field('video_camera', false, false);
$video_duration = get_field('video_duration', false, false);
$video_tags = get_field('video_tags', false, false);
$video_synopsis = get_field('video_synopsis', false, false); ?>

<div class="video">
    <iframe class="feature" src="<?php echo $vimeo_embed; ?>" width="100%" height="640" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <div class="video_details">
        <strong class="video_camera"><?php echo $video_camera; ?></strong>, <span class="video_duration"><?php echo $video_duration; ?></span>
        <span class="video_tags"><?php echo $video_tags; ?></span>
        <h3 class="video_synopsis-title">Synopsis -</h3>
        <p class="video_synopsis-text"><?php echo $video_synopsis; ?></p>
    </div>
    <?php  wp_reset_postdata(); ?>
</div>
