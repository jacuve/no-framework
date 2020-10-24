<?php declare(strict_types = 1);

namespace NoFramework\Page;

interface PageReader
{
    public function readBySlug(string $slug) : string;
}
