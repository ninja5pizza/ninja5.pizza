import { createChart, AreaSeries } from 'lightweight-charts';

const url = '/api/chart/pizza-ninjas';
const response = await axios.get(url);

const chart = createChart(
    document.getElementById('trading-view-charts'),
    {
        layout: {
            background: { color: '#ff5400' },
            textColor: '#fff',
        },
        grid: {
            vertLines: { color: '#c2410c' },
            horzLines: { color: '#c2410c' },
        },
        handleScroll: {
            mouseWheel: false,
            pressedMouseMove: false,
            horzTouchDrag: false,
            vertTouchDrag: false,
        },
        handleScale: {
            mouseWheel: false,
            pinch: false,
        },
    }
);

const priceFormatter = p => p.toFixed(2);

chart.applyOptions({
    localization: {
        priceFormatter: priceFormatter,
    },
});

chart.timeScale().fitContent();

const areaSeries = chart.addSeries(AreaSeries, {
    lineColor: '#f97316',
    topColor: '#fb923c',
    bottomColor: 'rgba(67, 20, 7, 0.28)',
});

areaSeries.setData(response.data);
