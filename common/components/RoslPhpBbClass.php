<?php

namespace common\components;

use yii\base\Component;

class RoslPhpBbClass extends Component {
    public $phpBB_user;
    public $phpBB_auth;
    public $phpBB_db;
    public $table_prefix;

    public function __construct(){
        // определяем видимые переменные.
        /*global  $phpbb_root_path,
                $phpEx,
                $user,
                $auth,
                $db,
                $table_prefix,
                $request;*/
        global $request;
        global $phpbb_container;
        global $phpbb_root_path, $phpEx, $user, $auth, $cache, $db, $config, $template, $table_prefix;
        global $request;
        global $phpbb_dispatcher;
        global $symfony_request;
        global $phpbb_filesystem;
        // Без константы никуда...
        define('IN_PHPBB', TRUE);
        // корневая папка форума.
        $phpbb_root_path = '../../forum/';
        // расширение подключаемых файлов. В нашем случае - php
        $phpEx = substr(strrchr(__FILE__, '.'), 1);
        // подключаем файлы
        // конфигурационные файлы
        include($phpbb_root_path . 'common.' . $phpEx);
        include($phpbb_root_path . 'config.' . $phpEx);
        // Функции для работы с пользователями
        include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
        // разрешим супер глобальные массивы...
        $request->enable_super_globals();
        // запускаем сессию пользователя
        $user->session_begin();
        $auth->acl($user->data);
        $this->phpBB_user = $user;
        $this->phpBB_auth = $auth;
        $this->phpBB_db   = $db;
        $this->table_prefix   = $table_prefix;
    }

    // регистрация
    public function registration($data = array()) {
        // если данные есть, можно попробовать поработать с ними
        if(count($data) < 3){
            // нам надо как минимум 3 элемента - логин, пароль и email
            return false;
        }

        $new_phphBB_user = array();

        // логин пользователя.
        if(!isset($data['username'])) return false;
        $new_phphBB_user['username'] = $data['username'];

        // пароль пользователя
        if(!isset($data['password'])) return false;
        $new_phphBB_user['user_password'] = phpbb_hash($data['password']);

        // email пользователя
        if(!isset($data['email'])) return false;
        $new_phphBB_user['user_email'] = $data['email'];

        $new_phphBB_user['group_id'] = isset($data['group_id']) ? $data['group_id'] : 2;

        $new_phphBB_user['user_type'] = isset($data['user_type']) ? $data['user_type'] : 0;

        // сохраняем пользователя в таблицах форума.
        $phphBB_user_id = user_add($new_phphBB_user, false);

        // возвращаем id пользователя в таблицах phpBB
        return $phphBB_user_id;
    }

    // авторизация
    public function login($data = array()){
        $this->phpBB_user->setup('ucp');

        // имя пользователя
        $username    = $data['username'];

        // пароль пользователя
        $password    = $data['password'];

        // Запомнить пользователя
        $autologin   = isset($data['autologin']) ? $data['autologin'] : 1;

        // Показывать пользователя в онлайне
        $viewonline  = true;

        // авторизация средствами phpBB
        $result = $this->phpBB_auth->login($username, $password, $autologin, $viewonline);

        // result возвращает массив
        // array(
        // 	'status' => status-code(int),
        // 	'error_msg'=> status-message-id(text),
        // 	'user_row'=> user-row(array),
        // );
        // Статусы
        // 1  - Не указан пароль
        // 3  - успешный вход
        // 10 - Неверный логин
        // 11 - Неверный пароль
        // 12 - Пользователь неактивен
        // 13 - Превышен лимит попыток входа

        return $result;
    }

    // выход
    public function logout(){
        $this->phpBB_user->session_kill();
        $this->phpBB_user->session_begin();
    }

    // удалить пользователя
    public function delete_user($mode = 'remove', $user_name = '') {

        // $mode = remove/retain - удалить или оставить в базе
        // по имени пользователя получить id, так как мы считаем, что id пользователя в форуме - на сайте нам не известен.
        $sql = 'SELECT user_id, username
			FROM phpbb_users
			WHERE username_clean = "'.utf8_clean_string($user_name).'"';

        $result = $this->phpBB_db->sql_query($sql);
        if (!($row = $this->phpBB_db->sql_fetchrow($result)))
        {
            $this->phpBB_db->sql_freeresult($result);
        }/* do
        {
            $user_id_ary[] = $row['user_id'];
        }*/

            // освобождаем память.
        $this->phpBB_db->sql_freeresult($result);
        /*if($user_id_ary){
            // если нашли пользователя - удаляем
            return user_delete($mode, $user_id_ary, $retain_username = true);
        }*/
        return false;
    }

    /*// бан пользователю.
    public function ban_user($user_name = '', $ban_minutes = 432000, $ban_reason = ''){
        // тип бана - устанавливаем по имени пользователя
        // бывает - по имени (user), по ип (ip), по email (email)
        return user_ban('user', $user_name, $ban_minutes, $ban_len_other = '', $ban_exclude = false, $ban_reason, $ban_give_reason = '');
    }

    // разбанить пользователя.
    public function unban_user($user_name = ''){
        // тип бана - устанавливаем по имени пользователя
        // бывает - по имени (user), по ип (ip), по email (email)
        // по имени пользователя получить id банов
        $sql = 'SELECT b.ban_id, u.user_id
				FROM phpbb_users u, phpbb_banlist b
				WHERE u.username_clean = "'.utf8_clean_string($user_name).'" AND u.user_id = b.ban_userid';

        $result = $this->phpBB_db->sql_query($sql);
        if (!($row = $this->phpBB_db->sql_fetchrow($result)))
        {
            $this->phpBB_db->sql_freeresult($result);
        }

        do
        {
            $user_ban_id_ary[] = $row['ban_id'];
        }
        $this->phpBB_db->sql_freeresult($result);
        return user_unban('user', $user_ban_id_ary);
    }*/

    // обновить данные пользователя.
    public function edit_user_pass($user_name ='', $user_pass) {
        if (empty($user_name) || empty($user_pass)){
            return false;
        }

        $sql = 'UPDATE ' . $this->table_prefix . 'users
				SET user_password="' . md5($user_pass) . '"
				WHERE username_clean = "'.utf8_clean_string($user_name).'"';
        $this->phpBB_db->sql_query($sql);

        return true;
    }

    public static function fix_smiles($str, $realpath){
        return str_replace('{SMILIES_PATH}', $realpath, $str);
    }
}