<?php

echo '-- Starting auto-pull on server --', "\n";

// Change directory to project root
`cd /var/www/xylot/v7`;

// Pull latest master
`git checkout master`;
`git reset --hard HEAD`;
`git pull -f`;

echo '-- Ending auto-pull. --', "\n";
