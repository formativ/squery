<?php

namespace Formativ\Query\Builder;

use Aura\SqlQuery\Sqlite\Select as Provider;

class AuraBuilder implements Builder
{

    /**
     * @var Provider
     */
    protected $provider;

    /**
     * @param Provider $provider
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return (string) $this->provider;
    }

    /**
     * @param string $table
     *
     * @return $this
     */
    public function from($table)
    {
        $this->provider->from($table);

        return $this;
    }

    /**
     * @param Builder $builder
     * @param mixed   $alias
     *
     * @return $this
     */
    public function fromSelect(Builder $builder, $alias = null)
    {
        $this->provider->fromSubSelect($builder, $alias);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function where($clause, $binding = null)
    {
        $this->provider->where($clause, $binding);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function orWhere($clause, $binding = null)
    {
        $this->provider->orWhere($clause, $binding);

        return $this;
    }

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function groupBy($columns)
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        $this->provider->groupBy($columns);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function having($clause, $binding = null)
    {
        $this->provider->having($clause, $binding);

        return $this;
    }

    /**
     * @param string $clause
     * @param mixed  $binding
     *
     * @return $this
     */
    public function orHaving($clause, $binding = null)
    {
        $this->provider->orHaving($clause, $binding);

        return $this;
    }

    /**
     * @param mixed $columns
     *
     * @return $this
     */
    public function orderBy($columns)
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        $this->provider->orderBy($columns);

        return $this;
    }

    /**
     * @param int $limit
     *
     * @return $this
     */
    public function limit($limit)
    {
        $this->provider->limit($limit);

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function offset($offset)
    {
        $this->provider->offset($offset);

        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function binding($key, $value = null)
    {
        $bindings = $key;

        if (!is_array($bindings)) {
            $bindings = [$key => $value];
        }

        foreach ($bindings as $key => $value) {
            $this->provider->bindValue($key, $value);
        }

        return $this;
    }

    /**
     * @param string $columns
     *
     * @return $this
     */
    public function columns($columns = "*")
    {
        if (!is_array($columns)) {
            $columns = [$columns];
        }

        $this->provider->cols($columns);

        return $this;
    }
}
