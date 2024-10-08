<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Milliondox</title>

    <!-- website font start -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <!-- website font end -->

    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- Add the Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Add the Flatpickr JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" type="text/css" href="/../assets/css/vendors/datatables.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/client-custom.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../assets/css/masteradmin.css">
    
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body class="master_adin_panel">
   @yield('content')
   <!-- latest jquery-->
    <!-- <script src="../assets/js/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/sidebar-menu.js"></script>
    <!-- <script src="../assets/js/tooltip-init.js"></script> -->
    <!-- Template js-->
    <script src="/../assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="/../assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="../assets/js/script.js"></script>
    


    <script src="../assets/js/theme-customizer/customizer.js">  </script>
    

    <!-- login js-->


        
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/store.js/1.3.14/store.min.js"></script>
    <script>
    $(document).ready(function() {
        $('body').removeClass('dark-only');
    });
    </script>
    
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const weeklyData = [5, 10, 15, 23, 10, 15, 10];
        const dailyData = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54, 57, 60, 63, 66, 69, 72, 75, 78, 81, 84, 87, 90, 93, 96];

        const ctx = document.getElementById('clientAcquisitionChart').getContext('2d');
        const clientAcquisitionChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: '',
                    data: weeklyData,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.raw + ' new';
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    }
                },
                elements: {
                    line: {
                        borderWidth: 3
                    },
                    point: {
                        radius: 5,
                        hoverRadius: 7,
                        hitRadius: 10,
                        borderWidth: 2
                    }
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                }
            }
        });

        document.getElementById('viewSelect').addEventListener('change', function() {
            const view = this.value;
            if (view === 'weekly') {
                clientAcquisitionChart.data.labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                clientAcquisitionChart.data.datasets[0].data = weeklyData;
            } else {
                clientAcquisitionChart.data.labels = Array.from({length: 31}, (_, i) => i + 1);
                clientAcquisitionChart.data.datasets[0].data = dailyData;
            }
            clientAcquisitionChart.update();
        });
    </script>
    

 <script>
        const mauData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'MAU',
                data: [400, 450, 500, 563, 480, 510],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                fill: false,
                tension: 0.1
            }]
        };

        const dauData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'DAU',
                data: [100, 150, 200, 263, 180, 210],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                fill: false,
                tension: 0.1
            }]
        };

        const config = {
            type: 'line',
            data: mauData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#666'
                        },
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        ticks: {
                            color: '#666'
                        },
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };

        let myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        function switchTab(tab) {
            document.querySelectorAll('.tab').forEach(t => {
                t.classList.remove('active');
                t.classList.add('inactive');
            });
            document.querySelector(`.tab:nth-child(${tab === 'MAU' ? 1 : 2})`).classList.add('active');
            document.querySelector(`.tab:nth-child(${tab === 'MAU' ? 1 : 2})`).classList.remove('inactive');
            myChart.data = tab === 'MAU' ? mauData : dauData;
            myChart.update();
        }
    </script>
    

    

    

    
  </body>
</html>