<?php declare(strict_types = 1);

namespace NoFramework\Menu;

interface MenuReader
{
    public function readMenu() : array;
}