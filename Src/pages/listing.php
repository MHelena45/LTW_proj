<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_auth.php');

  // Verify if user is logged in
  if (isset($_SESSION['username']))
    die(header('Location: main_page.php'));

  draw_header(null);
  draw_listing();
  draw_footer();
?>