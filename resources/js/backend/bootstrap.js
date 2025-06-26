import axios from 'axios';
import Swal from 'sweetalert2';
import '@davicotico/menu-editor/lib/css/styles.css';
import { MenuEditor } from '@davicotico/menu-editor';

window.axios = axios;
window.Swal = Swal;
window.MenuEditor = MenuEditor;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
