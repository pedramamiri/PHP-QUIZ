<?php
class question {
    public $key;
    public $svarskod;
    public $text;
    public $answer1;
    public $answer2;
    public $ranswer;
    

    public function __construct($newSvarskod,$newKey,$newtext, $newanswer1,$newanswer2,$newranswer) {
        $this->key      = $newKey;
        $this->svarskod = $newSvarskod;
        $this->text     = $newtext;
        $this->answer1  = $newanswer1;
        $this->answer2  = $newanswer2;
        $this->ranswer  = $newranswer;

    }
    public function setQuestion(){
        $form = "<div>";
        $form .= "<h2>{$this->text}</h2>";
        $form .= "<input type='radio' name='{$this->key}' value='".$this->answer1."'>{$this->answer1}<br>";
        $form .= "<input type='radio' name='{$this->key}' value='".$this->answer2."'>{$this->answer2}<br>";
        $form .= "<input type='hidden' name={$this->svarskod} value='".$this->ranswer."'><br>";
        $form .= "</div><br>";
        return $form;
    }
}

?>