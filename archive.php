<?php
  $term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); /* Variabel som ger namnet på taxonomin. */
?>

<?php
  get_header();
?>
<h1 class="n1"><?php echo $term->name; ?></h1>
<div class="container">
  <div class="grid">
  <?php
    while (have_posts()) {
    the_post();
  ?>
  <a href="<?php the_permalink(); ?>">
    <div>
        <h2><?php the_title(); ?></h2>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="500px" class="bandbild">
        <p><?php the_content(); ?></p>
    </div>
    </a>
    <?php } ?>
  </div>
</div>

<?php
  get_footer();
?>