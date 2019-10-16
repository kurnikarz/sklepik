<?php
    class session {
        private $id;
        private $ip;
        private $browser;
        private $time;
        private $user;
        private $salt;

        public function __construct() {
            global $polaczenie;

            if (!isset($_COOKIE[SESSION_COOKIE])) {
                $_COOKIE[SESSION_COOKIE] = '';
            }
            else {
                if (strlen($_COOKIE[SESSION_COOKIE]) != SESSION_ID_LENGHT) {
                    $this->newSession();
                }

            }

            $zapytanie = $polaczenie->query('SELECT session_id, update_at, salt_token, user_id, uniq_info, ip, browser FROM sessions WHERE session_id = '.$_COOKIE[SESSION_COOKIE].' AND uniq_info = :info AND update_at > :update AND ip = :ip AND browser = :browser');

        }
    }
?>