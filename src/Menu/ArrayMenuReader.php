<?php declare(strict_types = 1);

namespace NoFramework\Menu;

class ArrayMenuReader implements MenuReader
{
    public function readMenu() : array
    {
        return [
            ['href' => '/', 'text' => 'Homepage'],
        ];
    }
}