<?php
define('BC', 'hello world!');
define('WP_SITEURL', 'http://localhost:8080/wordpress5');
define('WP_HOME', 'http://localhost:8080/wordpress5');

// define('WP_PLUGIN_DIR', dirname(__FILE__). '/wp-content/plugins2');
// define('WP_PLUGIN_URL', 'http://localhost:8080/wordpress5/wp-admin/plugins.php');

define('WP_POST_REVISIONS',3,true);
define('AUTOSAVE_INTERVAL', 150);
define('SAVEQUERIES',true);

define('WP_MEMORY_LIMIT', '128M');
define('WPLANG', 'en-US');
define('LANGDIR', 'wp-content/my/languages');

// define('CUSTOM_USER_TABLE', 'share_users');

// Thiết lập giá trị không chỉnh sửa trong Admin
define('DISALLOW_FILE_EDIT', FALSE); 


