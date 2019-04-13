<?php

namespace Qbhy\FreeApis;

use Qbhy\Exception\RenderableException;

class FreeApisException extends RenderableException
{
    public function render($request)
    {
        return [
            'code' => $this->getCode(),
            'msg'  => $this->getMessage(),
            'data' => $this->getData(),
        ];
    }

}