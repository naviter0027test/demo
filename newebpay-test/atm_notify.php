<?php 
if(isset($_POST)) {
    file_put_contents('test.txt', json_encode($_POST));
}
