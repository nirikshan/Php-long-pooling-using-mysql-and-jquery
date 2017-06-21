<?php
header('Cache-Control:no-cache');
$user_connection_xprin = @mysqli_connect("localhost", "root", '', "notify") or die("Not Connected");

if (@mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . @mysqli_connect_error();
}

$GLOBALS['$globel_my_uname'] = strtolower("NIRIKSHANBHUSAL");
set_time_limit(0);
$show_chat = "SELECT * FROM `notification`  ORDER BY `time` DESC";

while (true) {
    
    $last_ajax_call = isset($_GET['timestamp']) ? (int) $_GET['timestamp'] : null;
    clearstatcache();
    
    $show_chat_query = mysqli_query($user_connection_xprin, $show_chat);
    if ($show_chat_query) {
        $row     = mysqli_fetch_array($show_chat_query);
        $tim_snd = (int) $row[3];
        
        if ($last_ajax_call == null || $tim_snd > $last_ajax_call) {
            
            $data   = $tim_snd - $last_ajax_call;
            $result = array(
                'big' => $tim_snd,
                'small' => $last_ajax_call,
                'result' => $data,
                'timestamp' => $tim_snd
            );
            
            $json = json_encode($result);
            echo $json;
            break;
            
        }
        
    } else {
        sleep(3);
        continue;
    }
}

?>