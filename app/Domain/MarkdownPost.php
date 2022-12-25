<?php

namespace App\Domain;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;
use League\CommonMark\MarkdownConverter;

class MarkdownPost
{
    public static function convert(string $content): string
    {
        $config = [
            'footnote' => [
                'backref_class'      => 'footnote-backref',
                'backref_symbol'     => __('home.back'),
                'container_add_hr'   => true,
                'container_class'    => 'footnotes',
                'ref_class'          => 'footnote-ref',
                'ref_id_prefix'      => 'fnref:',
                'footnote_class'     => 'footnote',
                'footnote_id_prefix' => 'fn:',
            ],
        ];

        $env = (new Environment($config))
            ->addExtension(new CommonMarkCoreExtension())
            ->addExtension(new FootnoteExtension());

        $converter = new MarkdownConverter($env);

        return $converter->convert($content);
    }
}
