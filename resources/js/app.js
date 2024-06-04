import './bootstrap';
import {Chart, BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, BarController} from 'chart.js';

Chart.register(BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, BarController);

window.Chart = Chart;
window.animateValue = animateValue;

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
