<?php

namespace App\Domain;

use Carbon\Carbon;

class Post
{
    public readonly string $title;
    public readonly Carbon $date;
    public readonly string $slug;

    public function __construct(string $filename)
    {
        $this->title = (string) str($filename)
            ->replaceFirst('-', '/')
            ->replaceFirst('-', '/')
            ->after('-')
            ->beforeLast('.')
            ->replace('-', ' ')
            ->replaceFirst('_', '')
            ->replaceFirst('_', ' :')
            ->ucfirst();
        $this->date = Carbon::createFromFormat('Y/m/d', str($filename)->replaceFirst('-', '/')->replaceFirst('-', '/')->before('-'));
        $this->slug = (string) str($filename)->beforeLast('.');
    }

    public static function make(string $filename): self
    {
        return new self($filename);
    }
}
