import './bootstrap';

import { createHighlighterCore } from 'shiki/core';
import { createOnigurumaEngine } from 'shiki/engine/oniguruma';
import json from 'shiki/langs/json.mjs';
import materialThemeOcean from 'shiki/themes/material-theme-ocean.mjs';

document.addEventListener('DOMContentLoaded', async () => {
    const jsonElements = document.querySelectorAll('div.language-json');

    if (jsonElements.length === 0) {
        return;
    }

    const highlighter = await createHighlighterCore({
        themes: [materialThemeOcean],
        langs: [json],
        engine: createOnigurumaEngine(() => import('shiki/wasm'))
    });

    for (let element of jsonElements) {
        try {
            const jsonText = element.innerText;
            const prettyJson = JSON.stringify(JSON.parse(jsonText), null, 2);

            const html = highlighter.codeToHtml(prettyJson, {
                lang: 'json',
                theme: 'material-theme-ocean'
            })

            element.innerHTML = html;
        } catch (error) {
            console.error('Failed to highlight or parse JSON:', error);
            element.textContent = 'Failed to highlight or parse JSON';
        }
    }
});
