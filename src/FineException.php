<?php

namespace wza\FineException;

use wza\FineException\ExceptionArguments;

abstract class FineException extends \Exception
{

    /**
     * @param ?ExceptionArguments $exceptionArguments
     */
    public function __construct( ?ExceptionArguments $exceptionArguments )
    {
        if ( is_null( $exceptionArguments ) ) {
            parent::__construct( $this->getPresetMessage(),
                                 $this->getPresetCode() );
        } else {
            parent::__construct( $exceptionArguments->getMessage() ?? $this->getPresetMessage(),
                                 $exceptionArguments->getCode() ?? $this->getPresetCode(),
                                 $exceptionArguments->getPrevious() );
        }
    }


    /**
     * Factory method
     *
     * @param ExceptionArguments|null $exceptionArguments
     *
     * @return static
     */
    public static function create( ExceptionArguments $exceptionArguments = null ): FineException
    {
        return new static( $exceptionArguments );
    }


    /**
     * @return string
     */
    public function getPresetMessage(): string
    {
        return '';
    }


    /**
     * @return int
     */
    public function getPresetCode(): int
    {
        return 0;
    }
}