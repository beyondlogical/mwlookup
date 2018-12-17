<?php
/*
 * mwd - simple example of using the Merriam-Webster dictionary JSON API service
 *
 */
    // Get the term to look up from the command invocation
    if (!isset($argv[1])) die("Usage: ".$argv[0]." TERM\n");
    $word = $argv[1];

    // Get API info
    // Ensure that you're signed up to get your own API keys and put them in this file
    // See API-KEYS.json.dist for the distributed copy of this file to use as a template
    $config = json_decode(file_get_contents('./API-KEYS.json'),true);

    // Prepare and execute API call
    $term = urlencode($word);
    $key = urlencode($config['dict']['key']);
    $uri = str_replace(['[KEY]','[TERM]'],[$key,$term],$config['dict']['uri']);
    $json = file_get_contents($uri);

    // Parse the response
    $resp = json_decode( $json, true );

    // Use the response as you will
    foreach ($resp as $n) {
        print_r($n);
    }

?>

