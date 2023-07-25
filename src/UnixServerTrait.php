<?php

namespace Ren\ServerTrait;

use React\Socket\UnixServer;
use React\EventLoop\LoopInterface;

use Ren\ServerTrait\ServerInterface;

trait UnixServerTrait
{
    use ServerInterface;

    /**
     * UnixServer object
     *
     * @var UnixServer
     */
    private UnixServer $server;

    /**
     * Starts new UnixServer
     *
     * @param mixed $path
     * @param LoopInterface|null $loop
     * @param array $context
     * @return void
     */
    public function start(mixed $path, ?LoopInterface $loop = null, array $context = array())
    {
        $this->server = new UnixServer($path, $loop, $context);
        $this->server->on('connection', [$this, 'onConnection']);
        $this->server->on('error', [$this, 'onError']);
    }
}