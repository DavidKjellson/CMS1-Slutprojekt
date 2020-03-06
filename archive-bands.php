<?php
  get_header();
?>

<?php
  while (have_posts()) {
    the_post();
?>

<?php
  $albums = get_field('discography');
  $albumobjects = $albums[0];
  $albumobjects2 = $albumobjects['albums'];
  $albumnames = $albumobjects2->post_title;
  $albumcovers = $albumobjects2->ID;
?>
<div class="container">
    <div class="grid">
      <div>
        <a href="<?php the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
          <img src="<?php the_post_thumbnail_url(); ?>" alt="" width="500px" class="bandbild">
        </a>
        <p><?php the_content(); ?></p>
      </div>

      <div>
        <h2>Discography</h2>

        <div class="grid2"> <!-- Foreach-loop som går igenom alla plattor och taxonomier. //David -->
        <?php
          foreach ($albums as $album) {
            $albumobjects = $album;
            $albumobjects2 = $albumobjects['albums'];
            $albumnames = $albumobjects2->post_title;
            $albumcovers = $albumobjects2->ID;
            $years = get_the_terms($albumcovers, 'year');
            $yearobjects = $years[0];
            $yearlinks = $yearobjects->slug;
            $yearnames = $yearobjects->name;
            $genres = get_the_terms($albumcovers, 'genre');
            $genreobjects = $genres[0];
            $genrelinks = $genreobjects->slug;
            $genrenames = $genreobjects->name;
            $records = get_the_terms($albumcovers, 'record_label');
            $recordobjects = $records[0];
            $recordlinks = $recordobjects->slug;
            $recordnames = $recordobjects->name;
        ?>
          <div>
          <a href="#ex1" rel="modal:open">
            <h4><?php echo $albumnames; ?></h4>

            <!-- popup fönstret //putte -->

            <?php echo get_the_post_thumbnail($albumcovers, [150]); ?></a>
          </div>
          <div id="ex1" class="modal">

            <div class="grid3">
              <div>
               
                <?php echo get_the_post_thumbnail($albumcovers, [150]); ?>
              </div>
              <div>
                <p><b>Year:</b> <?php echo $yearnames; ?></p>
                <p><b>Genre:</b> <a href="<?php echo get_term_link($genrelinks, 'genre'); ?>"><?php echo $genrenames; ?></p></a>
                <p><b>Label:</b> <a href="<?php echo get_term_link($recordlinks, 'record_label'); ?>"><?php echo $recordnames; ?></p></a>
              </div>
            </div>

            <h3>Tracklist:</h3>
            <ol>
            <?php
              while (have_rows('tracklist', $albumcovers)) {
                the_row();
            ?>
              <li><?php the_sub_field('tracks'); ?></li>
            <?php  } ?>
            </ol>
          </div>
          <?php } ?>
          <!-- popup slut //putte -->
          
        </div>
      </div>
    </div>
    <hr>
  </div>
  </div>
  </div>
  <?php } ?>
  



<?php
  get_footer();
?>