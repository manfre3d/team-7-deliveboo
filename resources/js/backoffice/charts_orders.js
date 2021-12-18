
import Chart from 'chart.js/auto';

const chartOrders = document.querySelector('#orders').getContext('2d');

// prendo lista ordini per mese e incassi per mese
const js_script = document.getElementById('js_script');

let ordersByMonths = js_script.getAttribute('data-orders');
ordersByMonths = JSON.parse(ordersByMonths);

let revenueByMonth = js_script.getAttribute('data-revenue');
revenueByMonth = JSON.parse(revenueByMonth);


let ordersChart = new Chart(chartOrders, {
  type: 'bar',
  data: {
    labels: ['genn','feb','mar','apr','mag','giu','lu','ago','set','ott','nov','dic'],
    datasets: [
      {
        label: 'ordini',
        data: ordersByMonths,
        backgroundColor: '#FFC890',
        yAxisID: 'y',
      },
      {
        label: 'incassi',
        data: revenueByMonth,
        backgroundColor: '#9AD0F5',
        yAxisID: 'y1',
      }
    ]
  },
  options: {
    responsive: true,
    interaction: {
      mode: 'index',
      intersect: false,
    },
    stacked: false,
    scales: {
      y: {
        type: 'linear',
        display: true,
        position: 'left',
      },
      y1: {
        type: 'linear',
        display: true,
        position: 'right',
        ticks: {
          callback: function(value) {
          return `${value} €`;
          }
        },
        // grid line settings
        grid: {
          drawOnChartArea: false, // only want the grid lines for one axis to show up
        },
      }
    },    
  },

});


const selectYear = document.querySelector('#year_selection_chart');
selectYear.addEventListener('change', (e) => {
  const yearUrlParam = e.target.value;
  window.location.replace(`/admin/grafici-ordini${yearUrlParam}`);
});