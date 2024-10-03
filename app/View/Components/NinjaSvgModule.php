<?php

namespace App\View\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class NinjaSvgModule extends Component implements Htmlable
{
    private string $innerSvgContent;

    private string $styleElement;

    private string $fileContent;

    public function __construct(
        public string $inscriptionId
    ) {
        $this->readContentsFromDisk();

        $this->extractInnerSvgContent();

        $this->extractStyleElement();

        $this->removeNewlinesFromSvgPaths();
    }

    protected function extractStyleElement(): void
    {
        $this->innerSvgContent = Str::of($this->innerSvgContent)
            ->replaceMatches(
                pattern: '/<style\s+type="text\/css">(.*?)<\/style>/si',
                replace: function ($match) {
                    $this->styleElement = $match[0];

                    return '';
                }
            )
            ->trim()
            ->toString();

        $this->removeDeprecatedCssAttributes();
    }

    protected function extractInnerSvgContent(): void
    {
        $this->innerSvgContent = Str::of($this->fileContent)
            ->replaceMatches(
                pattern: '/<svg[^>]*>/',
                replace: '',
            )
            ->replaceMatches(
                pattern: '/<\/svg>/',
                replace: '',
            )
            ->toString();
    }

    protected function removeDeprecatedCssAttributes(): void
    {
        $this->styleElement = Str::of($this->styleElement)
            ->replaceMatches(
                pattern: '/enable-background:\s*new\s*\;/',
                replace: '',
            )
            ->toString();
    }

    protected function removeNewlinesFromSvgPaths(): void
    {
        $this->innerSvgContent = Str::of($this->innerSvgContent)
            ->replaceMatches(
                pattern: '/<path[^>]*\/>/s',
                replace: function ($matches) {
                    return str_replace(["\r\n", "\n", "\r"], ' ', $matches[0]);
                }
            )
            ->toString();
    }

    protected function readContentsFromDisk(): void
    {
        $this->fileContent = Storage::disk('ninja_modules')->get($this->inscriptionId.'.svg');

        $this->fileContent = Str::of($this->fileContent)
            ->replace("\t", '')
            ->trim()
            ->toString();
    }

    public function openTag(): string
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">'.PHP_EOL;
    }

    public function closeTag(): string
    {
        return PHP_EOL.'</svg>';
    }

    public function styleElement(): string
    {
        return $this->styleElement;
    }

    public function toHtml(): string
    {
        return Str::of($this->openTag())
            ->append($this->innerSvgContent)
            ->append($this->closeTag())
            ->toString();
    }

    public function render(): string
    {
        return $this->toHtml();
    }
}
