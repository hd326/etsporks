<?php
    // make sure the page uses a secure connection
    $https = filter_input(INPUT_SERVER, 'HTTPS');
    if (!$https) {
        $host = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING);
        // localhost
        
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
        // htdocs destination?
        
        $url = 'https://' . $host . $uri;
        
        // the host + the folder (or folders)
        
        
        header("Location: " . $url);
        exit();
    }
?>