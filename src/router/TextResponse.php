<?php

class TextResponse
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }
}