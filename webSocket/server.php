<?php
/*
Demo Websocket: Server Code
---------------------------
    @Author: ANHVNSE02067
    @Website: www.nhatanh.net
    @Email: anhvnse@gmail.com
 */
require "vendor/websockets.php";

class Server extends WebSocketServer
{
    private $_connecting = 'Conectando al servidor...';
    private $_welcome = 'Hola, bienvenido al servidor!';

    protected function connected($user)
    {
        // Send welcome message to user
        $this->send($user, $this->_welcome);
    }    

    protected function process($user, $message)
    {
        // Upper case user message and send back to user
        //$response = 'Upper case -> ' . strtoupper($message);
        $this->send($user, $message);
    }

    protected function closed($user)
    {
        // Alert on server
        echo "User $user->id  closed connection" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Server destroyed!" . PHP_EOL;
    }
}


//$addr = '200.14.68.31';
$addr = '0.0.0.0';
$port = '2207';

$server = new Server($addr, $port);
try {
  $server->run();
}
catch (Exception $e) {
  $server->stdout($e->getMessage());
}