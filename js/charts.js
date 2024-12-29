document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('userChart').getContext('2d');

    // Date dinamice transmise din PHP
    const userCounts = JSON.parse(document.getElementById('userChartData').textContent);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: userCounts.labels,
            datasets: [{
                label: 'Users Created Per Day',
                data: userCounts.data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
