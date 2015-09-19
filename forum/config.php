<?php
// phpBB 3.1.x auto-generated configuration file
// Do not change anything in this file!
$dbms = 'phpbb\\db\\driver\\mysqli';
$dbhost = 'localhost';
$dbport = '';
$dbname = 'travel';
$dbuser = 'root';
$dbpasswd = '0794';
$table_prefix = 'forum_';
$phpbb_adm_relative_path = 'adm/';
$acm_type = 'phpbb\\cache\\driver\\file';

@define('PHPBB_INSTALLED', true);
// @define('PHPBB_DISPLAY_LOAD_TIME', true);
@define('DEBUG', true);
@define('DEBUG_CONTAINER', true);

define('DELETE_CACHE', true);  
if (defined('DELETE_CACHE') && file_exists('./cache'))  
    foreach (glob('./cache/*.php') as $cache_file)  
        unlink($cache_file);