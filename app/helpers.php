<?php

use Intervention\Image\Facades\Image;

function presentPrice($price)
{
    //return number_format($price / 2);
    return number_format($price, 2, '.', ' ');
}

function generateUserImage($userName)
{
    // Cria uma imagem 90x90 com a cor de fundo gerada
    $image = Image::canvas(50, 50, "#364B73");

    // Pega as iniciais do nome do usuário
    $initials = strtoupper(implode('', array_map(function ($word) {
        return $word[0];
    }, explode(' ', $userName))));

    // Adiciona as iniciais à imagem
    $image->text($initials, 25, 25, function ($font) {
        $font->file(1); // Adapte o caminho da fonte
        $font->size(100);
        $font->color('#000000');
        $font->align('center');
        $font->valign('middle');
    });

    // Retorna a imagem em formato base64
    $imageData = (string) $image->encode('data-url');

    return $imageData;
}
