<?php
  get_header();
?>

<?php
  while (have_rows('hero')) {
    the_row();
?>
  <section id="hero" style="background-image:url('<?php echo get_sub_field('background')['url']; ?>')">
    <div class="logo">
      <img src="<?php echo get_sub_field('name')['url']; ?>" alt="">
    </div>
  </section>
  <?php } ?>
  <?php
    while (have_posts()) {
      the_post();
  ?>
  <div class="container">
    <main>
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>
    </main>
  </div>
  <?php } ?>

<?php
  get_footer();
?>