<?php

namespace Ren\ServerTrait;

use React\Socket\ConnectionInterface;

trait ServerInterface
{
    /**
     * Returns server address
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->server->getAddress();        
    }

    /**
     * Pauses the server
     *
     * @return void
     */
    public function pause(): void
    {
        $this->server->pause();
    }

    /**
     * Resumes the server
     *
     * @return void
     */
    public function resume(): void
    {
        $this->server->resume();
    }

    /**
     * Closes the server
     *
     * @return void
     */
    public function close(): void
    {
        $this->server->close();
    }

    /**
     * Callback to be called on new connection
     *
     * @param ConnectionInterface $connection
     * @return void
     */
    abstract public function onConnection(ConnectionInterface $connection);

    /**
     * Callback to be called on error
     *
     * @param \Exception $e
     * @return void
     */
    abstract public function onError(\Exception $e);
}