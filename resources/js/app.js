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

import AOS from 'aos';
import 'aos/dist/aos.css';

Chart.register(BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, BarController, DoughnutController, ArcElement);

window.Chart = Chart;
window.animateValue = animateValue;
window.AOS = AOS;

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
