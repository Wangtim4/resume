<?php
include_once "../base.php";
$DB=new DB($_POST['table']);

if(!empty($_POST['id'])){
    foreach($_POST['id'] as $idx=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $DB->del($id);
        }else{
            $row=$DB->find($id);

            switch($_POST['table']){
                case "title":
                    $row['text']=$_POST['text'][$idx];
                    $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
                break;
                case "admin":
                    $row['acc']=$_POST['acc'][$idx];
                    $row['pw']=$_POST['pw'][$idx];
                    
                break;
                case "menu":
                    $row['text']=$_POST['text'][$idx];
                    $row['href']=$_POST['href'][$idx];
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
                case "ad":
                case "news":
                    $row['text']=$_POST['text'][$idx];
                    $row['content']=$_POST['content'][$idx];
                    $row['time']=$_POST['time'][$idx];
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;                
                break;
                case "image":
                    $row['text']=$_POST['text'][$idx];
                    break;
                case "mvim":
                    $row['title']=$_POST['title'][$idx];
                    $row['href']=$_POST['href'][$idx];
                    $row['text']=$_POST['text'][$idx];
                    $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;                
                break;
            }

            $DB->save($row);
        }
    }
}

to("../back.php?do={$_POST['table']}");

?>