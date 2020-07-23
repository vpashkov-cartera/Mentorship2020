<?php
function loop_size(Node $node): int
{
    $slow = $node;
    $fast = $node;

    while ($slow && $fast && $fast->getNext()) {
        $slow = $slow->getNext();
        $fast = $fast->getNext()->getNext();
        if ($fast === $slow) {
            $temp = $slow;
            $temp = $temp->getNext();
            $count = 1;
            while ($temp !== $slow) {
                $count++;
                $temp = $temp->getNext();

            }
            return $count;
        }
    }
    return 0;
}
