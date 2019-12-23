<?php
  echo $config['base_url'] = 'http://'.$_SERVER['SERVER_NAME'].'/dreamtoy_member/';

  echo "<hr />";

  $potocal = 'http'.((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '');
  $directory = '/dreamtoy_member/';
  $base_url = $potocal . '://'.$_SERVER['HTTP_HOST'] . $directory;
  echo $config['base_url'] = $base_url;
?>


<!-- RewriteEngine on
RewriteCond $1 !1^(index\.php|resource|robot\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L,QSA] -->
