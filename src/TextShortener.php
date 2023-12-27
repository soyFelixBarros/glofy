<?php declare(strict_types=1);

namespace Glofy\Challenges;

use Glofy\Challenges\TextShortenInterface;

class TextShortener implements TextShortenInterface
{
    public function shortenText(string $text, int $limit): string
	{
        // Encontrar la posición del primer punto en el texto hasta la longitud máxima
        $pointPosition = mb_strpos(mb_substr($text, 0, $limit), '.');

        if ($pointPosition !== false) {
            // Cortar el texto hasta la posición del primer punto (incluyendo el punto)
            return substr($text, 0, $pointPosition) . '...';
        }
        
        // Verificar si el texto es una sola palabra sin espacios
        if (strpos($text, ' ') === false) {
            return mb_substr($text, 0, $limit - 3) . '...';
        }

        // Verificar si la longitud del texto es menor o igual a la longitud máxima
        if (mb_strlen($text) <= $limit) {
            return $text;
        }

        // Encontrar la última posición de espacio en el texto hasta la longitud máxima
        $spacePosition = mb_strrpos(mb_substr($text, 0, $limit - 3), ' ');
        
        // Cortar el texto hasta la última posición de espacio o la longitud máxima
        return mb_substr($text, 0, $spacePosition) . '...';
    }
}