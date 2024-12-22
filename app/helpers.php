<?php

function cdn_asset(string $path): string
{
    $cdnUrl = config('app.cdn_url');

    $path = '/' . ltrim($path, '/');

    return $cdnUrl . $path;
}
