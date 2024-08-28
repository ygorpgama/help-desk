import axios from 'axios';
window.axios = axios;

import Alpine from 'alpinejs'
import Intersect from '@alpinejs/intersect'

Alpine.plugin(Intersect)

Alpine.start()

window.Alpine = Alpine

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
