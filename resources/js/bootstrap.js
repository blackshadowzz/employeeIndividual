window._ = require('lodash');

try {
    require('bootstrap');
    required('admin-lte');
} catch (e) {}



window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


