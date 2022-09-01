<?php

declare(strict_types=1);

namespace Emonkak\Enumerable;

/**
 * @template T
 * @implements \IteratorAggregate<T>
 * @implements EnumerableInterface<T>
 */
class Sequence implements \IteratorAggregate, EnumerableInterface
{
    /**
     * @use EnumerableExtensions<T>
     */
    use EnumerableExtensions;

    /**
     * @psalm-var iterable<array-key,T>
     * @var iterable
     */
    private $source;

    /**
     * @psalm-param iterable<array-key,T> $source
     */
    public function __construct(iterable $source)
    {
        $this->source = $source;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator(): \Traversable
    {
        foreach ($this->source as $element) {
            yield $element;
        }
    }

    /**
     * @psalm-return iterable<array-key,T>
     */
    public function getSource(): iterable
    {
        return $this->source;
    }
}
