<?php
	
    class Session {
        private static $handler=null;
        private static $ip=null;
        private static $lifetime=null;
        private static $time=null;
        //初始化变量；
        private static function init($handler){
            self::$handler=$handler;
            //$_SERVER["REMOTE_ADDR"]获取客户端路由地址；
            self::$ip = !empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : 'unknown';
            //ini_get()获取配置文件变量；
            self::$lifetime=ini_get('session.gc_maxlifetime');
            self::$time=time();
        }
 
        static function start(PDO $pdo){
            self::init($pdo);
            //_CLASS_  代表本类；
            session_set_save_handler(
                    array(__CLASS__,"open"),
                    array(__CLASS__,"close"),
                    array(__CLASS__,"read"),
                    array(__CLASS__,"write"),
                    array(__CLASS__,"destroy"),
                    array(__CLASS__,"gc")
                );
 
            session_start();
        }
 
        public static function open($path, $name){
            return true;
        }
 
        public static function close(){
            return true;
        }
         
        public static function read($PHPSESSID){
            $sql="select PHPSESSID, update_time, client_ip, data from session where PHPSESSID= ?";
 
            $stmt=self::$handler->prepare($sql);
 
            $stmt->execute(array($PHPSESSID));
             
            if(!$result=$stmt->fetch(PDO::FETCH_ASSOC)){
                return '';
            }
 
            if( self::$ip  != $result["client_ip"]){
                self::destroy($PHPSESSID);
                return '';
            }
 
            if(($result["update_time"] + self::$lifetime) < self::$time ){
                self::destroy($PHPSESSID);
                return '';
            }
 
            return $result['data'];
 
        }
 
        public static function write($PHPSESSID, $data){
            $sql="select PHPSESSID, update_time, client_ip, data from session where PHPSESSID= ?";
 
            $stmt=self::$handler->prepare($sql);
 
            $stmt->execute(array($PHPSESSID));
 
            if($result=$stmt->fetch(PDO::FETCH_ASSOC)){
                if($result['data'] != $data || self::$time > ($result['update_time']+30)){
                    $sql="update session set update_time = ?, data =? where PHPSESSID = ?";
                     
                    $stm=self::$handler->prepare($sql);
                    $stm->execute(array(self::$time, $data, $PHPSESSID));
                 
                }
            }else{
                if(!empty($data)){
                    $sql="insert into session(PHPSESSID, update_time, client_ip, data) values(?,?,?,?)";
 
                    $sth=self::$handler->prepare($sql);
 
                    $sth->execute(array($PHPSESSID, self::$time, self::$ip, $data));
                }
            }
 
            return true;
        }
 
        public static function destroy($PHPSESSID){
            $sql="delete from session where PHPSESSID = ?";
 
            $stmt=self::$handler->prepare($sql);
 
            $stmt->execute(array($PHPSESSID));
 
            return true;
        }
 
        private static function gc($lifetime){
            $sql = "delete from session where update_time < ?";
 
            $stmt=self::$handler->prepare($sql);
 
            $stmt->execute(array(self::$time-$lifetime));
 
            return true;
        }   
    }
 
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=myeducation", "root", "123456");
		$pdo->query('set names utf8'); 
    }catch(PDOException $e){
        echo $e->getMessage();
    }
 
    Session::start($pdo);