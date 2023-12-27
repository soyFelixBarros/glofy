<?php declare(strict_types=1);

namespace Glofy\Challenges;

interface TextShortenInterface {
    public function shortenText(string $text, int $limit): string;
}