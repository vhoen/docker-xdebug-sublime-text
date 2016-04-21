<?php
    /***
    From "Howto check xdebug installation - NetBeans for PHP : weblog" at https://blogs.oracle.com/netbeansphp/entry/howto_check_xdebug_installation
    To use: 1) load this script (which is blocking, i.e, won't show any output/finish loading until a connection with Xdebug was established)
            2) in another browser window/tab, load http://127.0.0.1/index.php?XDEBUG_SESSION_START=session_name

    NOTE:   Make sure:
            a)  server has proper Xdebug extension installed & loaded (refer to "Xdebug: Support; Tailored Installation Instructions" at http://xdebug.org/wizard.php),
            b)  server has "php_sockets" extension enabled/loaded (needed for the script below)
            c)  $address is set appropriately, and $port variable corresponds to "xdebug.remote_port" in php.ini (default 9000)
    ***/
    $address = '127.0.0.1';
    $port = 9000;
    $sock = socket_create(AF_INET, SOCK_STREAM, 0);
    socket_bind($sock, $address, $port) or die('Unable to bind');
    socket_listen($sock);
    $client = socket_accept($sock);
    echo "connection established: $client";
    socket_close($client);
    socket_close($sock);
?>