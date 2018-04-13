<?php print $header; ?>

<?php print render($page['slider']); ?>

<main id="main" class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <div class="helper">
    <?php print $messages; ?>
    <?php print $breadcrumb; ?>
    <?php print render($page['help']); ?>

    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>

    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>
  </div>

  <?php print render($page['front']); ?>
</main>

<?php print $footer; ?>