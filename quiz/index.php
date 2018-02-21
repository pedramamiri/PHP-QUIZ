<?php 
session_start();
include './include/array.php';
include './include/class.php';
if(!$_POST){
$los = array();    
echo "<form action='index.php' method='post'>";
foreach($array as $key=>$item){
    $cont = $key+1;
    echo "<h3 style='background-color:#ffffcc;width:30%;padding:3px;border-radius:3px;'>Question ".$cont.":"."</h3>";
    $mygues = new question($item['svarskod'],$item['key'],$item['text'],$item['newanswer1'],$item['newanswer2'],$item['newranswer']);
    echo $mygues->setQuestion();
    array_push($los,$item['key']);
    $_SESSION['los'] = $los;
}
echo "<input style='background-color:#ffffcc;padding:7px;width:150px;border:2px solid #92a8d1;'  type='submit' value='correct'></form>";
}
if($_POST){
    $x=0;
    foreach($_SESSION['los'] as $key=>$value){
        $cont = $key+1; 
        $s = 's';
        $s .= $value;
        if($value == 1){
            echo "<div style='background-color: #92a8d1;border:5px solid #92a8d1;border-radius:4px;padding:3px;width:40%;'>";
            echo "<h3>Question ".$cont.":"."<br/></h3>";
            echo "True";
            echo "<br/>";
            echo "the answer is : ".$_POST[$s];
            echo "</div>";
            echo "<br/><br/>";
            $x++;
        }else if($_POST[$value] == $_POST[$s]){
            echo "<div style='background-color: #92a8d1;border:5px solid #92a8d1;border-radius:4px;padding:3px;width:40%;'>";
            echo "<h3>Question ".$cont.":"."<br/></h3>";
            echo "True";
            echo "<br/>";
            echo "the answer is : ".$_POST[$s];
            echo "</div>";
            echo "<br/><br/>";
            $x++;
        }else{
            echo "<div style='background-color: #92a8d1;border:5px solid #92a8d1;border-radius:4px;padding:3px;width:40%;'>";
            echo "<h3>Question ".$cont.":"."<br/></h3>";
            echo "false";
            echo "<br/>";
            echo "the True answer is : ".$_POST[$s];
            echo "</div>";
            echo "<br/><br/>";
        }
    }
    $x = ($x/10)*100;
    echo $x."% of your answers was true ."."<div style='height:40px;width:40%;border: 3px solid #f44274;border-radius:4px;'><div style='height:40px;width:".$x."%;background-color: #f44274;'></div></div>";
}



?>