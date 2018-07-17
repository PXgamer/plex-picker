<?php

namespace pxgamer\PlexPicker\Exceptions;

/**
 * Class NoVideosFoundException
 */
class NoVideosFoundException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'No videos were found.';
}
