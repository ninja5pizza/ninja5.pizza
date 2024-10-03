<?php

namespace App\View\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class NinjaSvgModule extends Component implements Htmlable
{
    private string $innerSvg;

    private string $styleElement;

    private string $contents;

    public function __construct(
        public string $inscriptionId
    ) {
        $this->readContentsFromDisk();
    }

    public function readContentsFromDisk(): void
    {
        $svgContent = Storage::disk('ninja_modules')->get($this->inscriptionId.'.svg');

        $this->innerSvg = Str::of($svgContent)
            ->replaceMatches(
                pattern: '/enable-background:\s*new\s*\;/',
                replace: '',
            )
            ->replace("\t", '')
            ->replaceMatches(
                pattern: '/<svg[^>]*>/',
                replace: '',
            )
            ->replaceMatches(
                pattern: '/<\/svg>/',
                replace: '',
            )
            ->replaceMatches(
                pattern: '/<style\s+type="text\/css">(.*?)<\/style>/si',
                replace: function ($match) {
                    $this->styleElement = $match[0];

                    return '';
                }
            )
            ->replaceMatches(
                pattern: '/<path[^>]*\/>/s',
                replace: function ($matches) {
                    return str_replace(["\r\n", "\n", "\r"], ' ', $matches[0]);
                }
            )
            ->trim()
            ->toString();

        $this->contents = Str::of($this->openTag())
            ->append($this->innerSvg)
            ->append($this->closeTag());
    }

    public function openTag(): string
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">'.PHP_EOL;
    }

    public function closeTag(): string
    {
        return PHP_EOL.'</svg>';
    }

    public function toHtml(): string
    {
        return $this->contents;
    }

    public function render(): string
    {
        return $this->toHtml();
    }
}
