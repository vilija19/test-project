<?php


namespace Aigletter\Contracts\Builder;


interface QueryBuilderInterface extends BuilderInterface
{
    /**
     * @return QueryInterface
     */
    public function build(): QueryInterface;
}