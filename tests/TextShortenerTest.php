<?php

declare(strict_types=1);

namespace Glofy\Challenges\Tests;

use PHPUnit\Framework\TestCase;
use Glofy\Challenges\TextShortener;

class TextShortenerTest extends TestCase
{
    public function test_sentence_is_divided_into_the_last_complete_word_1(): void
    {
        $text = 'Design patterns were introduced to the software community in Design Patterns, by Erich Gamma, Richard Heleo. Design patterns were introduced to the software community in month.';
        $expected = 'Design patterns were introduced to the software community in Design Patterns, by Erich Gamma,...';
        $textShortener = new TextShortener();
        $shortenedText = $textShortener->shortenText($text, 100);
        $this->assertEquals($expected, $shortenedText);
    }

    public function test_sentence_is_divided_into_the_last_complete_word_2(): void
    {
        $text = 'Design patterns were introduced to the software community in Design Patterns by Erich Gamma Richard heleo Design patterns were introduced to the software community in Design Patterns by Erich Gamma Richard Heleo';
        $expected = 'Design patterns were introduced to the software community in Design Patterns by Erich Gamma...';
        $textShortener = new TextShortener();
        $shortenedText = $textShortener->shortenText($text, 100);
        $this->assertEquals($expected, $shortenedText);
    }

    public function test_cut_at_the_first_point_found_1(): void
    {
        $text = 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdk.jfklñsdfñklsdjhfajñksdhfñkjad.shfñjkawehruiññjshdfjkash.dfkñjhasdfjkñdhsafjkñasdhf';
        $expected = 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdk...';
        $textShortener = new TextShortener();
        $shortenedText = $textShortener->shortenText($text, 100);
        $this->assertEquals($expected, $shortenedText);
    }

    public function test_test_cut_at_the_first_point_found_2(): void
    {
        $text = 'This is a sentence.';
        $expected = 'This is a sentence...';
        $textShortener = new TextShortener();
        $shortenedText = $textShortener->shortenText($text, 100);
        $this->assertEquals($expected, $shortenedText);
    }

    public function test_cut_a_single_word_without_spaces(): void
    {
        $text = 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdkjfklñsdfñklsdjhfajñksdhfñkjadshfñjkawehruiññjshdfjkashdfkñjhasdfjkñdhsafjkñasdhf';
        $expected = 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdkjfklñsdfñklsdjhfajñksdhfñkjadshfñjkawehruiññjshdfjkash...';
        $textShortener = new TextShortener();
        $shortenedText = $textShortener->shortenText($text, 100);
        $this->assertEquals($expected, $shortenedText);
    }

    public function test_string_does_not_reach_length(): void
    {
        $text = 'This is a sentence';
        $expected = 'This is a sentence';
        $textShortener = new TextShortener();
        $shortenedText = $textShortener->shortenText($text, 100);
        $this->assertEquals($expected, $shortenedText);
    }
}