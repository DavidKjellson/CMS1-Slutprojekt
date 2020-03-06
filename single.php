<?php
  get_header();
?>


<div class="container">
    <main>
      <h1 class="n1"><?php single_post_title(); ?></h1>

      <section class="news">
        <?php
          while (have_posts()) {
            the_post();
        ?>
        <div class="item">
          <br><br><br>
          <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="450px">
        </div>
        <div class="item-text">
          <br><br>
            <ol>
            <?php
              while (have_rows('tracklist', $albumcovers)) {
                the_row();
            ?>
              <li><?php the_sub_field('tracks'); ?></li>
            <?php  } ?>
            </ol>
          <p><?php the_content(); ?></p>
          <?php the_field('spotify'); ?>
          <ul class="archives">
            <li>
              <i class="fa fa-calendar"></i> <a href=""><?php echo get_the_date(); ?></a>
            </li>
            <li>
              <i class="fa fa-user"></i> <a href=""><?php the_author_posts_link(); ?></a>
            </li>
            <li>
              <i class="fa fa-tag"></i> <a href=""><?php the_category(', '); ?></a>
            </li>
          </ul>
          <hr>
          </hr>
        </div>
        <?php } ?>
      </div>




      </section>
    </main>
  </div>

<?php
  get_footer();
?>