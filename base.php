<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB
{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db15";
    protected $user='root';
    protected $pw='';
    public $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
    }

    public function all(...$arg){
        $sql="select * from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }
         //echo $sql;

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    //只取一筆
    public function find($id){
        $sql="select * from $this->table ";

            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= " WHERE `id` = '$id' ";
            }

         //echo $sql;

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    }
    public function del($id){
        $sql="DELETE from $this->table ";

            if(is_array($id)){
                foreach($id as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= " WHERE `id` = '$id' ";
            }

         //echo $sql;

        return $this->pdo->exec($sql);

    }

    public function save($array){

        if(isset($array['id'])){
            //更新
            foreach($array as $key => $value){
                if($key!='id'){
                    $tmp[]="`$key`='$value'";
                }
            }
            $sql="UPDATE $this->table SET ";
            $sql.=join(',',$tmp);
            $sql.=" WHERE `id`='{$array['id']}'";

        }else{
            //新增
            $sql="INSERT INTO $this->table (`".join("`,`",array_keys($array))."`) values('".join("','",$array)."')";
        }

         echo $sql;

        return $this->pdo->exec($sql);

    }

    public function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                
                $sql .= " WHERE " . join(" AND ", $tmp);

            }else{
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }
         //echo $sql;

        return $this->pdo->query($sql)->fetchColumn();
    }

    public function q($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}

class Str{
    public $header;
    public $tdHead;

    public $updateImg;
    public $uploadModal;

    public $acc;
    public $pw;

    public $mainText;
    public $mainHref;
    
    public $subText;
    public $subHref;
    public $addBtn;
    public $addModalHeader;
    public $addModalcol;
    public $table;
    public function __construct($table)
    {
        $this->table=$table;
        switch($table){
           
            case 'image':
                $this->header="PS/AI作品管理";
                $this->tdHead=["作品圖片","作品連結"];
                $this->updateImg="更換圖片";
                $this->uploadModal=["更換作品圖片","作品圖片"];
                $this->addBtn="新增";
                $this->addModalHeader="新增作品圖片";
                $this->addModalcol=["作品圖片"];                
            break;
            case 'mvim':
                $this->header="網頁作品管理";
                $this->tdHead=["作品標題","網址連結","網頁作品圖片","作品內容"];
                $this->updateImg="更換圖片";
                $this->uploadModal=["更換圖片","網頁圖片"];
                $this->addBtn="新增";
                $this->addModalHeader="新增網頁圖片";
                $this->addModalcol=["作品標題","網址連結","網頁作品圖片","作品內容"];                     
            break;
            case 'news':
                $this->header="履歷資料管理";
                $this->tdHead=["標題","內容"];
                $this->addBtn="新增";
                $this->addModalHeader="新增履歷資料";
                $this->addModalcol=["履歷資料","履歷內容"];                
            break;
         
        }
    }
}

function to($url){
    header("location:".$url);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$Image=new DB('image');
$Mvim=new DB('mvim');
$News=new DB('news');
$Admin=new DB('admin');
if(isset($do)){
    $Str=new Str($do);
}




?>
