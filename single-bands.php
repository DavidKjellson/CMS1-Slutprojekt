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
          <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="500px" class="bandbild">
        </div>
        <div class="item-text">
          <p><?php the_content(); ?></p>
          <?php the_field('spotify'); ?>
          <ul class="archives">
            <li>
              <i class="fa fa-calendar"></i> <a href=""><?php echo get_the_date(); ?></a>
            </li>
            <li>
              <i class="fa fa-user"></i> <a href=""><?php the_author_posts_link(); ?></a>
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