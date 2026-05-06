const FALLBACK_EMOJIS = [
    { char: '😀', name: 'grinning face' },
    { char: '😁', name: 'beaming face' },
    { char: '😂', name: 'tears of joy' },
    { char: '😊', name: 'smiling face' },
    { char: '😍', name: 'heart eyes' },
    { char: '😘', name: 'kiss face' },
    { char: '😎', name: 'cool face' },
    { char: '🤗', name: 'hugging face' },
    { char: '🤔', name: 'thinking face' },
    { char: '😅', name: 'relieved face' },
    { char: '🙂', name: 'slightly smiling face' },
    { char: '🙌', name: 'raising hands' },
    { char: '👏', name: 'clapping hands' },
    { char: '👍', name: 'thumbs up' },
    { char: '🙏', name: 'folded hands' },
    { char: '🔥', name: 'fire' },
    { char: '⭐', name: 'star' },
    { char: '❤️', name: 'red heart' },
    { char: '🎉', name: 'party popper' },
    { char: '🚚', name: 'delivery truck' },
];

function escapeAttribute(value) {
    return String(value)
        .replaceAll('&', '&amp;')
        .replaceAll('"', '&quot;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;');
}

function normalizeEmoji(entry) {
    const unicode = Array.isArray(entry?.unicode) ? entry.unicode : [];
    if (0 === unicode.length) {
        return null;
    }

    try {
        return {
            char: String.fromCodePoint(...unicode.map((item) => parseInt(String(item).replace('U+', ''), 16))),
            name: String(entry?.name ?? 'emoji').toLowerCase(),
        };
    } catch {
        return null;
    }
}

function renderEmojis(grid, emojis) {
    if (0 === emojis.length) {
        grid.innerHTML = '<div class="small text-muted">No emojis match your search.</div>';
        return;
    }

    grid.innerHTML = emojis.map((emoji) => `
        <button
            type="button"
            class="emoji-picker-item"
            data-emoji-insert
            data-emoji="${escapeAttribute(emoji.char)}"
            title="${escapeAttribute(emoji.name)}"
            aria-label="${escapeAttribute(emoji.name)}"
        >${emoji.char}</button>
    `).join('');
}

async function loadEmojis(form, state) {
    state.status.textContent = 'Loading emojis...';

    try {
        const response = await fetch(form.dataset.emojiApiUrl, {
            headers: {
                Accept: 'application/json',
            },
        });

        if (!response.ok) {
            throw new Error(`Emoji API returned ${response.status}`);
        }

        const payload = await response.json();
        state.emojis = payload
            .map((entry) => normalizeEmoji(entry))
            .filter((entry) => null !== entry)
            .slice(0, 180);

        state.status.textContent = 'Emoji list loaded.';
    } catch {
        state.emojis = FALLBACK_EMOJIS;
        state.status.textContent = 'External emoji API unavailable. Showing fallback emojis.';
    }

    state.filtered = state.emojis;
    state.loaded = true;
    renderEmojis(state.grid, state.filtered);
}

function insertEmoji(textarea, emoji) {
    const start = textarea.selectionStart ?? textarea.value.length;
    const end = textarea.selectionEnd ?? textarea.value.length;
    const prefix = textarea.value.slice(0, start);
    const suffix = textarea.value.slice(end);
    const spacer = prefix.length > 0 && !prefix.endsWith(' ') ? ' ' : '';

    textarea.value = `${prefix}${spacer}${emoji}${suffix}`;

    const cursorPosition = (prefix + spacer + emoji).length;
    textarea.focus();
    textarea.setSelectionRange(cursorPosition, cursorPosition);
}

function setupEmojiPicker(form) {
    if (form.dataset.emojiPickerInitialized === 'true') {
        return;
    }

    const panel = form.querySelector('[data-emoji-panel]');
    const toggle = form.querySelector('[data-emoji-toggle]');
    const close = form.querySelector('[data-emoji-close]');
    const search = form.querySelector('[data-emoji-search]');
    const status = form.querySelector('[data-emoji-status]');
    const grid = form.querySelector('[data-emoji-grid]');
    const textarea = form.querySelector('[data-emoji-textarea]');

    if (!panel || !toggle || !close || !search || !status || !grid || !textarea) {
        return;
    }

    const state = {
        loaded: false,
        emojis: [],
        filtered: [],
        panel,
        search,
        status,
        grid,
        textarea,
        toggle,
    };

    panel.hidden = true;

    toggle.addEventListener('click', async (event) => {
        event.preventDefault();

        if (!panel.hidden) {
            panel.hidden = true;
            toggle.setAttribute('aria-expanded', 'false');
            return;
        }

        panel.hidden = false;
        toggle.setAttribute('aria-expanded', 'true');

        if (!state.loaded) {
            await loadEmojis(form, state);
        }

        search.focus();
    });

    close.addEventListener('click', (event) => {
        event.preventDefault();
        panel.hidden = true;
        toggle.setAttribute('aria-expanded', 'false');
    });

    search.addEventListener('input', () => {
        const term = search.value.trim().toLowerCase();
        state.filtered = '' === term
            ? state.emojis
            : state.emojis.filter((emoji) => emoji.name.includes(term));

        renderEmojis(grid, state.filtered);
    });

    grid.addEventListener('click', (event) => {
        const button = event.target.closest('[data-emoji-insert]');
        if (!button) {
            return;
        }

        event.preventDefault();
        insertEmoji(textarea, button.dataset.emoji ?? '');
    });

    form.dataset.emojiPickerInitialized = 'true';
}

function initializeEmojiPickers() {
    document.querySelectorAll('[data-emoji-picker]').forEach((form) => {
        setupEmojiPicker(form);
    });
}

document.addEventListener('turbo:load', initializeEmojiPickers);
document.addEventListener('DOMContentLoaded', initializeEmojiPickers);
