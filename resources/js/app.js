import './bootstrap';
import {Chart, BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, BarController} from 'chart.js';

Chart.register(BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend, BarController);

window.Chart = Chart;
