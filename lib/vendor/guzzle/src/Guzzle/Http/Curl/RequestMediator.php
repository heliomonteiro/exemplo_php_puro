<?php

namespace Guzzle\Http\Curl;

use Guzzle\Http\Message\RequestInterface;

/**
 * Mediator between curl handles and request objects
 */
class RequestMediator
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @param RequestInterface $request Request to mediate
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * Receive a response header from curl
     *
     * @param resource $curl   Curl handle
     * @param string   $header Received header
     *
     * @return int
     */
    public function receiveResponseHeader ($curl, $header)
    {
        return $this->request->receiveResponseHeader($header);
    }

    /**
     * Received a progress notification
     *
     * @param int $downloadSize Total download size
     * @param int $downloaded   Amount of bytes downloaded
     * @param int $uploadSize   Total upload size
     * @param int $uploaded     Amount of bytes uploaded
     */
    public function progress($downloadSize, $downloaded, $uploadSize, $uploaded)
    {
        $this->request->dispatch('curl.callback.progress', array(
            'request'       => $this->request,
            'download_size' => $downloadSize,
            'downloaded'    => $downloaded,
            'upload_size'   => $uploadSize,
            'uploaded'      => $uploaded
        ));
    }

    /**
     * Write data to the response body of a request
     *
     * @param resource $curl  Curl handle
     * @param string   $write Data that was received
     *
     * @return int
     */
    public function writeResponseBody($curl, $write)
    {
        $this->request->dispatch('curl.callback.write', array(
            'request' => $this->request,
            'write'   => $write
        ));

        return $this->request->getResponse()->getBody()->write($write);
    }

    /**
     * Read data from the request body and send it to curl
     *
     * @param resource $ch     Curl handle
     * @param resource $fd     File descriptor
     * @param int      $length Amount of data to read
     *
     * @return string
     */
    public function readRequestBody($ch, $fd, $length)
    {
        $read = '';

        if ($this->request->getBody()) {
            $read = $this->request->getBody()->read($length);
            $this->request->dispatch('curl.callback.read', array(
                'request' => $this->request,
                'read'    => $read
            ));
        }

        return !$read ? '' : $read;
    }
}
