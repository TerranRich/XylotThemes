<?php

// Use in the "Post-Receive URLs" section of your GitHub repo.

if ($_POST['payload']) {
  shell_exec( `cd /var/www/xylot/v7/ && git reset --hard HEAD && git pull && drush cr` );
}
else {
  error_log('Tried running scripts/hooks/git-pull.php, no payload apparent.');
  die('No payload was given. This sucks.');
}
