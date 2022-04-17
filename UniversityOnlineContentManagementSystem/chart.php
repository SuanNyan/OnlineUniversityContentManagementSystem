<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        '<?php echo $facultyarray[0] ?>',
        '<?php echo $facultyarray[1] ?>',
        '<?php echo $facultyarray[2] ?>',
        '<?php echo $facultyarray[3] ?>',
        '<?php echo $facultyarray[4] ?>',
        '<?php echo $facultyarray[5]  ?>',


        ],
        datasets: [{
            label: 'Contributions ',
            data: [
                '<?php echo $nofoaritclesarray[0]  ?>',
             '<?php echo $nofoaritclesarray[1]  ?>',

            '<?php echo $nofoaritclesarray[2]  ?>',
            '<?php echo $nofoaritclesarray[3]  ?>',
            '<?php echo $nofoaritclesarray[4]  ?>',
 '<?php echo $nofoaritclesarray[5]  ?>',



            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>