<?php

declare(strict_types=1);

namespace Emonkak\Enumerable\Iterator;

use Emonkak\Enumerable\EnumerableExtensions;
use Emonkak\Enumerable\EnumerableInterface;
use Emonkak\Enumerable\Internal\Converters;

/**
 * @template TSource
 * @implements \IteratorAggregate<TSource>
 * @implements EnumerableInterface<TSource>
 * @use EnumerableExtensions<TSource>
 */
class ReverseIterator implements \IteratorAggregate, EnumerableInterface
{
    use EnumerableExtensions;

    /**
     * @var iterable<TSource>
     */
    private $source;

    /**
     * @param iterable<TSource> $source
     */
    public function __construct(iterable $source)
    {
        $this->source = $source;
    }

    /**
     * @return \Traversable<TSource>
     */
    public function getIterator(): \Traversable
    {
        $array = Converters::toArray($this->source);
        for ($i = count($array) - 1; $i >= 0; $i--) {
            yield $array[$i];
        }
    }
}
