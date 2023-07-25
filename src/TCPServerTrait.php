<?php

namespace Ren\ServerTrait;

use React\Socket\TcpServer;
use React\EventLoop\LoopInterface;

use Ren\ServerTrait\ServerInterface;

trait TCPServerTrait
{
    use ServerInterface;

    /**
     * TcpServer object
     *
     * @var TcpServer
     */
    private TcpServer $server;

    /**
     * Starts new TcpServer
     *
     * @param mixed $uri
     * @param LoopInterface|null $loop
     * @param array $context
     * @return void
     */
    public function start(mixed $uri, ?LoopInterface $loop = null, array $context = array())
    {
        $this->server = new TcpServer($uri, $loop, $context);
        $this->server->on('connection', [$this, 'onConnection']);
        $this->server->on('error', [$this, 'onError']);
    }
}