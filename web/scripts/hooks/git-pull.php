<?php

// Use in the "Post-Receive URLs" section of your GitHub repo.
if (@$_POST['repository']) {
  if (@$_POST['repository']['name'] == 'XylotThemes') {
    shell_exec( `cd /var/www/xylot/v7/ && git reset --hard HEAD && git pull && drush cr` );
  }
  else {
    error_log('Invalid information given in GitHub payload (' . __FILE__ . ')');
  }
}
else {
  error_log('Tried running scripts/hooks/git-pull.php, no payload apparent. $_POST indexes available: ' . implode(', ', array_keys($_POST)));
  die('No payload was given. This sucks.');
}
