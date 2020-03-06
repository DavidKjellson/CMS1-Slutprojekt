<?php
  get_header();
?>

<h1 class="n1">
  <?php
    printf( __( 'Search results for:') . ' ' .      get_search_query() ); 
  ?> <!-- Visar texten "Search results for:" + vad man sökte på. //David -->
</h1>

<div class="container">
    <main>

      <section class="news">
        <?php
          if (have_posts()) {
            while (have_posts()) {
              the_post();
        ?>
        <div class="item">
          <a href="<?php the_permalink(); ?>">
        <h1 class="n1"><?php the_title(); ?></h1>
          <br><br><br>
          <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="450px">
          </a>
        </div>
        <div class="item-text">
          <br><br>
          <p><?php echo get_the_excerpt(); ?></p>
            <ol>
            <?php
              while (have_rows('tracklist', $albumcovers)) {
                the_row();
            ?>
              <li><?php the_sub_field('tracks'); ?></li>
            <?php  } ?>
            </ol>
          <ul class="archives">
            <li>
              <i class="fa fa-calendar"></i> <a href="<?php echo get_month_link(get_post_time('Y'), get_post_time('m')); ?>"><?php echo get_the_date(); ?></a>
            </li>
            <li>
              <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
            </li>
          </ul>
          <hr>
          </hr>
        </div>
        <?php } ?>
        <?php } else { ?>
          <h1 class="n1">🤘 No results! 🤘</h1>
        <?php } ?>
      </div>




      </section>
    </main>
  </div>

<?php
  get_footer();
?>