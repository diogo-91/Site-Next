MIT License

Copyright (C) 2020, Twilio SendGrid, Inc. <help@twilio.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and <?php

namespace SendGrid\Exception;

/**
 * Class InvalidHttpRequest
 *
 * Thrown when invalid payload was constructed, which could not reach SendGrid server.
 *
 * @package SendGrid\Exception
 */
class InvalidRequest extends \Exception
{
    public function __construct(
        $message = "",
        $code = 0,
        \Exception $previous = null
    )
    {
        $message = 'Could not send request to server. ' .
            'CURL error ' . $code . ': ' . $message;
        parent::__construct($message, $code, $previous);
    }
}
