import Lenis from '@studio-freight/lenis';
import Aos from 'aos';
import 'aos/dist/aos.css';

Aos.init();
let lenis = new Lenis();

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);
