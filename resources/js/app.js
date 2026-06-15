import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import 'flowbite';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';


window.Quill = Quill;
window.Alpine = Alpine

Alpine.plugin(collapse)
Alpine.start()
