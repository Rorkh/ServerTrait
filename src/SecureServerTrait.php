<?php

namespace Ren\ServerTrait;

use React\Socket\SecureServer;
use React\EventLoop\LoopInterface;

use Ren\ServerTrait\ServerInterface;

trait UnixServerTrait
{
    use ServerInterface;

    /**
     * SecureServer object
     *
     * @var SecureServer
     */
    private SecureServer $server;

    /**
     * Starts new SecureServer
     *
     * @param ServerInterface $tcp
     * @param LoopInterface|null $loop
     * @param array $context
     * @return void
     */
    public function start(ServerInterface $tcp, LoopInterface $loop = null, array $context = array())
    {
        $this->server = new SecureServer($tcp, $loop, $context);
        $this->server->on('connection', [$this, 'onConnection']);
        $this->server->on('error', [$this, 'onError']);
    }
}