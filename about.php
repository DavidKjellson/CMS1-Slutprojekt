<?php /* Template Name: About */ ?>

<?php
  get_header();
?>

<?php
  while (have_posts()) {
    the_post();
?>

<div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="grid5">
      <div>
        <p><?php the_content(); ?></p>
      </div>
    <div><img id="aboutimg" src="<?php the_post_thumbnail_url(); ?>" alt="" width="100%"></div>
  </div>
  </div>
<?php } ?>

<?php
  get_footer();
?>