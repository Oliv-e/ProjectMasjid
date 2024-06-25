<div class=" bg-white p-3 rounded-2xl my-2 mx-1 md:w-[300px]">
    <h1>Keuangan</h1>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let chartData = JSON.parse(`<?php echo $chartData; ?>`)
    console.log(chartData)
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels: chartData.label,
        datasets: [{
            label: '# of Votes',
            data: chartData.data,
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>