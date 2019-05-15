<?php

// Use in the "Post-Receive URLs" section of your GitHub repo.

if ($_POST['payload']) {
  shell_exec( `cd /var/www/xylot/v7/ && git reset --hard HEAD && git pull` );
}
else {
  die('No payload given. This sucks.');
}
