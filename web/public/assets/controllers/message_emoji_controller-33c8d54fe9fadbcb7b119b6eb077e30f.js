import { Controller } from '@hotwired/stimulus';

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

export default class extends Controller {
    static targets = ['panel', 'grid', 'textarea', 'search', 'status', 'toggleButton'];

    static values = {
        apiUrl: String,
    };

    connect() {
        this.loaded = false;
        this.emojis = [];
        this.filteredEmojis = [];
        this.panelTarget.hidden = true;
    }

    async togglePicker(event) {
        event.preventDefault();

        if (!this.panelTarget.hidden) {
            this.closePicker();
            return;
        }

        this.panelTarget.hidden = false;
        this.toggleButtonTarget.setAttribute('aria-expanded', 'true');

        if (!this.loaded) {
            await this.loadEmojis();
        }

        if (this.hasSearchTarget) {
            this.searchTarget.focus();
        }
    }

    closePicker() {
        this.panelTarget.hidden = true;
        this.toggleButtonTarget.setAttribute('aria-expanded', 'false');
    }

    filterEmojis() {
        const term = this.searchTarget.value.trim().toLowerCase();

        this.filteredEmojis = '' === term
            ? this.emojis
            : this.emojis.filter((emoji) => emoji.name.includes(term));

        this.renderEmojis();
    }

    insertEmoji(event) {
        event.preventDefault();

        const emoji = event.currentTarget.dataset.emoji;
        if (!emoji) {
            return;
        }

        const textarea = this.textareaTarget;
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

    async loadEmojis() {
        this.statusTarget.textContent = 'Loading emojis from the external API...';

        try {
            const response = await fetch(this.apiUrlValue, {
                headers: {
                    Accept: 'application/json',
                },
            });

            if (!response.ok) {
                throw new Error(`Emoji API returned ${response.status}`);
            }

            const payload = await response.json();
            this.emojis = payload
                .map((entry) => this.normalizeEmoji(entry))
                .filter((entry) => null !== entry)
                .slice(0, 180);

            this.statusTarget.textContent = 'EmojiHub loaded. Pick an emoji and continue typing.';
        } catch (error) {
            this.emojis = FALLBACK_EMOJIS;
            this.statusTarget.textContent = 'Emoji API is unavailable right now. Showing a local fallback list.';
        }

        this.filteredEmojis = this.emojis;
        this.loaded = true;
        this.renderEmojis();
    }

    renderEmojis() {
        if (0 === this.filteredEmojis.length) {
            this.gridTarget.innerHTML = '<div class="small text-muted">No emojis match your search.</div>';
            return;
        }

        this.gridTarget.innerHTML = this.filteredEmojis
            .map((emoji) => `
                <button
                    type="button"
                    class="emoji-picker-item"
                    data-action="message-emoji#insertEmoji"
                    data-emoji="${this.escapeAttribute(emoji.char)}"
                    title="${this.escapeAttribute(emoji.name)}"
                    aria-label="${this.escapeAttribute(emoji.name)}"
                >${emoji.char}</button>
            `)
            .join('');
    }

    normalizeEmoji(entry) {
        const unicode = Array.isArray(entry?.unicode) ? entry.unicode : [];
        if (0 === unicode.length) {
            return null;
        }

        try {
            return {
                char: String.fromCodePoint(...unicode.map((item) => parseInt(String(item).replace('U+', ''), 16))),
                name: String(entry?.name ?? 'emoji').toLowerCase(),
            };
        } catch (error) {
            return null;
        }
    }

    escapeAttribute(value) {
        return String(value)
            .replaceAll('&', '&amp;')
            .replaceAll('"', '&quot;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;');
    }
}
