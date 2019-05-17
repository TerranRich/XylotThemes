<?php

echo '-- Starting auto-pull on server --', "\n";

`cd /var/www/xylot/v7`;
`git pull`;

echo '-- Ending auto-pull. --', "\n";
