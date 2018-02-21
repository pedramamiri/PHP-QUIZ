<?php 
session_start();
include './include/array.php';
include './include/class.php';
if(!$_POST){
$los = array();    
echo "<form action='index.php' method='post'>";
foreach($array as $key=>$item){
    $cont = $key+1;
    echo "<h3>Question ".$cont.":"."<br/></h3>";
    $mygues = new question($item['svarskod'],$item['key'],$item['text'],$item['newanswer1'],$item['newanswer2'],$item['newranswer']);
    echo $mygues->setQuestion();
    array_push($los,$item['key']);
    $_SESSION['los'] = $los;
}
echo "<input type='submit' value='correct'></form>";
}
if($_POST){
    $x=0;
    foreach($_SESSION['los'] as $key=>$value){
        $cont = $key+1; 
        $s = 's';
        $s .= $value;
        if($value == 1){
            echo "<h3>Question ".$cont.":"."<br/></h3>";
            echo "True";
            echo "<br/>";
            echo "the answer is : ".$_POST[$s];
            echo "<br/><br/><br/>";
            $x++;
        }else if($_POST[$value] == $_POST[$s]){
            echo "<h3>Question ".$cont.":"."<br/></h3>";
            echo "True";
            echo "<br/>";
            echo "the answer is : ".$_POST[$s];
            echo "<br/><br/><br/>";
            $x++;
        }else{
            echo "<h3>Question ".$cont.":"."<br/></h3>";
            echo "false";
            echo "<br/>";
            echo "the True answer is : ".$_POST[$s];
            echo "<br/><br/><br/>";
        }
    }
    $x = ($x/10)*100;
    echo "<div style='height:40px;width:400px;border: 3px solid red;'><div style='height:40px;width:".$x."%;background-color: red;'>".$x."% of your answer was true</div></div>";
}



?>