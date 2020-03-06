<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta property="og:title" content="<?php single_post_title(); ?>"> <!-- Visar titeln på den valda sidan när man delar den. -->
  <meta property="og:type" content="website"> <!-- Visar typen av sidan. -->
  <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>"> <!-- Visar bilden när man delar. -->
  <meta property="og:description" content="<?php echo get_the_excerpt(); ?>"> <!-- Visar ett uttdrag ur texten på sidan. -->
  <!-- //David -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="main-header">
    <div class="container">
      <nav id="navbar">
        <ul>
        <?php 
          wp_nav_menu( array(
            'theme_location' => 'navbar',
          )); /* Importerar menyn "Navbar", som man ställer in i Adminpanelen. //David */
        ?>
        <div class="search">
          <?php get_search_form(); ?> <!-- Importerar koden från searchform.php. //David -->
        </div>
        </ul>
      </nav>
    </div>
  </header>

<!--   <div class="search">
          <input type="text" placeholder="Search...">
          <button type="button"><i class="fa fa-search"></i></button>
        </div> -->