<header id="header" role="banner" <?php echo $bg; ?>>
  <a href="/" title="Главная" id="logo"  class="image avatar">
    <?php if (!theme_get_setting('default_logo')): ?>
      <img src="<?php print theme_get_setting('logo'); ?>" alt="<?php print variable_get('site_name'); ?>" />
    <?php else: ?>
      <?php if (drupal_is_front_page()): ?>
        <h1><?php print variable_get('site_name'); ?></h1>
      <?php else: ?>
        <?php print variable_get('site_name'); ?>
      <?php endif; ?>
    <?php endif; ?>
  </a>

  <?php if (!drupal_is_front_page()): ?>
    <h1><?php print drupal_get_title(); ?></h1>
  <?php endif; ?>

  <?php if ($action): ?>
    <section class="region region-action"><?php print render($action); ?></section>
  <?php endif; ?>

  <nav>
    <?php
    $menu = menu_navigation_links('main-menu');
    print theme('links__main_menu', array(
      'links' => $menu,
      'attributes' => array(
        'id' => 'main-menu-links',
        'class' => array('links'),
      )));
    ?>
  </nav>
</header>