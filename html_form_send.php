<?php
    $error_message = "REEOE";
    
    died($error_message);
    
    function died($error) {
        echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
?>