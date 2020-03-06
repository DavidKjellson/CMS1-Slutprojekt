<?php /* Template Name: Contact */ ?>

<?php
  get_header();
?>

<?php
  while (have_posts()) {
    the_post();
?>

<main>
      <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="grid4">
        <?php
          while (have_rows('contacts')) {
            the_row();
        ?>
        <div class="card">
          <img src="<?php echo get_sub_field('head')['url']; ?>" alt="John" style="width:100%">
          <h1><?php the_sub_field('name'); ?></h1>
          <p class="title"><?php the_sub_field('title'); ?></p>

          <a href="<?php the_sub_field('twitter'); ?>"><i class="fa fa-twitter"></i></a>
          <a href="<?php the_sub_field('linkedin'); ?>"><i class="fa fa-linkedin"></i></a>
          <a href="<?php the_sub_field('facebook'); ?>"><i class="fa fa-facebook"></i></a>
          <a href="mailto:<?php the_sub_field('email'); ?>"><p><button><?php the_sub_field('button'); ?></button></p></a>
        </div>
        <?php } ?>

      </div>

      <?php the_content(); ?>
      </div>
    </main>
<?php } ?>

<?php
  get_footer();
?>