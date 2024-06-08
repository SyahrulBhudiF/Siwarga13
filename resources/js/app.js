import './bootstrap';
import {
    Chart,
    BarElement,
    CategoryScale,
    LinearScale,
    Title,
    Tooltip,
    Legend,
    BarController,
    DoughnutController,
    ArcElement
} from 'chart.js';
import Typewriter from 'typewriter-effect/dist/core';
import AOS from 'aos';
import 'aos/dist/aos.css';
// import function to register Swiper custom elements
import { register } from 'swiper/element/bundle';
// register Swiper custom elements
register();

Chart.register(BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, BarController, DoughnutController, ArcElement);

window.Chart = Chart;
window.animateValue = animateValue;
window.AOS = AOS;
window.Typewriter = Typewriter;

AOS.init({
    duration: 1000,
    easing: "ease-in-out",
    once: true,
    mirror: false
});

// Function to animate counter
function animateValue(id, start, end, duration, text) {
    if (start > end) {
        let temp = start;
        start = end;
        end = temp;
    }

    let range = end - start;
    let current = start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let obj = document.getElementById(id);

    let timer = setInterval(function () {
        current += increment;
        obj.innerHTML = current + " " + text;
        if (current == end) {
            clearInterval(timer);
        }
    }, stepTime);
}
