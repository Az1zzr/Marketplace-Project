import { startStimulusApp } from '@symfony/stimulus-bundle';
import MessageEmojiController from './controllers/message_emoji_controller.js';

const app = startStimulusApp();

app.register('message-emoji', MessageEmojiController);

export { app };
