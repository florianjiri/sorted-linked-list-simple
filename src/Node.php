<?php

namespace Florianjiri\SortedLinkedListSimple;

class Node
{
    public String|int $value;

    public Node|null $next;

    public function __construct(String|int $value, Node|null $next)
    {
        $this->value = $value;
        $this->next = $next;
    }
}
