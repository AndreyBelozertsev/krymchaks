import ('./bootstrap');
import 'tw-elements';
import 'flowbite';
import ('./yandex-map');

import('./assets/contact-form');
import('./assets/toogle-bottom-menu');

import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);

import Alpine from 'alpinejs';
import lightGallery from 'lightgallery';

// Plugins
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';

lightGallery(document.getElementById('lightgallery'), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,
});

import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();

window.Alpine = Alpine;

Alpine.start();
