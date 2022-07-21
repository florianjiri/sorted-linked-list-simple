<?php

namespace Florianjiri\SortedLinkedListSimple;

class SortedLinkedList
{
    protected Node|null $firstNode = null;

    public function add(String|int $value): void
    {
        if (! $this->firstNode) {
            $this->firstNode = new Node($value, null);
        } else {
            if ($value < $this->firstNode->value) {
                $this->firstNode = new Node($value, $this->firstNode);

                return;
            }

            $current = $this->firstNode;
            while ($current) {
                if ($current->value <= $value && isset($current->next) && $current->next->value > $value) {
                    $current->next = new Node($value, $current->next);

                    return;
                } elseif ($current->value <= $value && ! isset($current->next)) {
                    $current->next = new Node($value, $current->next);

                    return;
                }
                $current = $current->next;
            }
        }
    }

    public function remove(String|int $value): bool
    {
        if (! $this->firstNode) {
            return false;
        }
        if ($this->firstNode->value === $value) {
            $this->firstNode = $this->firstNode->next;

            return true;
        }

        $current = $this->firstNode;
        while ($current) {
            if (isset($current->next)) {
                if ($current->next->value === $value) {
                    $current->next = $current->next->next;

                    return true;
                }
                $current = $current->next;
            } else {
                return false;
            }
        }
    }

    public function __toString(): string
    {
        $string = "";
        $current = $this->firstNode;
        while ($current) {
            $string .= $current->value . PHP_EOL;
            $current = $current->next;
        }

        return $string;
    }
}
