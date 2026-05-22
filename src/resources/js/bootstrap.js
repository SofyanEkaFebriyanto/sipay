/* Import Axios untuk menangani request HTTP ke server secara asynchronous */
import axios from 'axios';
window.axios = axios;

/* Mengatur header default untuk Axios agar server mengenali request sebagai AJAX */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
