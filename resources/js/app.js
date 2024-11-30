import './bootstrap';

import { codeToHtml } from 'shiki'

document.addEventListener('DOMContentLoaded', async () => {
    const jsonElements = document.querySelectorAll('div.language-json');

    for (let element of jsonElements) {
        try {
            const jsonText = element.innerText;
            const prettyJson = JSON.stringify(JSON.parse(jsonText), null, 2);

            const html = await codeToHtml(prettyJson, {
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
