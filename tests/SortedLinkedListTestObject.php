<?php
namespace Florianjiri\SortedLinkedListSimple;

class SortedLinkedListTestObject extends SortedLinkedList {

    public function getFirstNode():Node|Null
    {
        return $this->firstNode;
    }
}