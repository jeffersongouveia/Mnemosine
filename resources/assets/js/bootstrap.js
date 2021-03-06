/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

window.axios = require('axios');

window.axios.defaults.headers.common = {
'X-Requested-With': 'XMLHttpRequest'
};

import Form from './utilities/Form';
window.Form = Form;

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    next();
});
