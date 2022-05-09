<?php


namespace Aigletter\Contracts\Builder;


interface BuilderInterface
{
    /**
     * @param array|string $columns
     * @return $this
     */
    public function select($columns): self;

    /**
     * @param array|string $conditions
     * @return $this
     */
    public function where($conditions): self;

    /**
     * @param string $table
     * @return $this
     */
    public function table($table): self;

    /**
     * @param int $limit
     * @return $this
     */
    public function limit($limit): self;

    /**
     * @param int $offset
     * @return $this
     */
    public function offset($offset): self;

    /**
     * @param array|string $order
     * @return $this
     */
    public function order($order): self;
}