<?php
function getListOfCommands() {
  return 'Type "<code>show: List of commands</code>" to see a list of commands I understand.<br/>
  Type "<code>open: www.google.com</code>" to open Google.com<br/>
  Type "<code>say: Hello bot</code>" to get me to say "Hello bot"<br/>
  Type "<code>train: Your question # My reply</code>" to train me to understand how to reply to more things';
}

function getRandomNumber() {
  return (rand(10,10000));
}

function getBotName() {
  return "the_ozmic's bot";
}

function getRandomFact(){
  $facts = ["Most toilets flush in E flat",
  "“Almost” is the longest word in English with all the letters in alphabetical order.",
  "All swans in England belong to the queen.",
  "No piece of square paper can be folded more than 7 times in half."];

  return $facts[rand(0, count($facts) - 1)];
}

    //functions defined by @chigozie. DO NOT MODIFY!!!
    function getDayOfWeek(){ 
        return date("l");
    }

    function getDaysInMonth($month){
        $months_with_31_days = ["january", "march", "may", "july", "august", "october", "december"];
        $months_with_30_days = ["april", "june", "september", "november"];
        $other = ["february"];

        $month = strtolower(trim($month));
        if(in_array($month, $months_with_31_days)){
            return "31 days";
        }else if(in_array($month, $months_with_30_days)){
            return "30 days";
        }else if(in_array($month, $other)){
            $ans = "29 days in a leap year. Otherwise, it has 28 days. ";
            $ans .= "If you are interested in the current year ".date("Y").", then February has ";
            if(isCurrentYearLeap()){
                $ans .= "29 days";
            }else{
                $ans .= "28 days";
            }
            return $ans;
        }else{
            return "I don't recognize the month you entered";
        }
    }

    function isCurrentYearLeap(){
        $currrent_year = intval(date('Y'));
        if($currrent_year % 400 === 0){
            return true;
        }
        if($currrent_year % 100 === 0){
            return false;
        }
        if($currrent_year % 4 === 0){
            return true;
        }
        return false;
    }
    //end of functions defined by @chigozie


?>
