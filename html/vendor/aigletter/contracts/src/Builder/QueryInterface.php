<?php


namespace Aigletter\Contracts\Builder;


interface QueryInterface
{
    /**
     * @return string
     */
    public function toSql(): string;
}