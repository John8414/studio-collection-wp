/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */


try {
    window.Popper = require('@popperjs/core').default;
    window.$ = window.jQuery = require('jquery');

    window.bootstrap = require('bootstrap');
    require('slick-carousel');
    require('jquery-lazy');
} catch (e) {}
