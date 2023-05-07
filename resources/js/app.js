import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

// import jQuery from 'jquery';
// window.$ = jQuery;

Alpine.plugin(focus);

Alpine.start();