<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

if( $_SESSION['user_ccl'] == 1){

    ?>


    <html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo(strtotime('now')) ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scout mureÈ™</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css' rel='stylesheet' type='text/css'>



    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <style>

        /*!
         * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template-overviews/simple-sidebar)
         * Copyright 2013-2019 Start Bootstrap
         * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/LICENSE)
         */
        body {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }

        .toggleClass-privat{
            background-image: linear-gradient(to left, #516630, #425427, #34431f, #263316, #1a230d);
            color: white;
            padding: 5px;
            margin-bottom: 5px;
            cursor: pointer;
            border-radius: 5px;
            font-family: Montserrat,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
        }
        .hidden{
            display:none;
        }

        .iToggle{
            font-size: 25px;
        }

        .alignCenter{
            text-align: center;
        }

        .asideClass{
            width: 100px;
            padding: 0;
            margin: 0;
            display: inline-block;
        }

        .spclCont{
            display: inline-block!important;
            margin-left: 135px!important;
            width: 100%;
        }

        .dataTable{
            width:100%;
        }

    </style>
</head>
<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Administrează sistemul de VOT </div>
        <div class="list-group list-group-flush">
            <a href="#dash" class="list-group-item list-group-item-action bg-light tabAct">Dashboard</a>
            <a href="#addVot" class="list-group-item list-group-item-action bg-light tabAct">Adaugă în lista de votare</a>
            <a href="#viewList" class="list-group-item list-group-item-action bg-light tabAct">Vizualizează lista de votare</a>
            <a href="#users" class="list-group-item list-group-item-action bg-light tabAct">Administrează utilizatori</a>
            <a href="#ready" class="list-group-item list-group-item-action bg-light tabAct">Gata oricând!</a>
            <a href="logout.php" class="list-group-item list-group-item-action bg-light">Deloghează-te</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        </nav>

        <div class="container-fluid pl-5">
            <div class="row toHide" id="dash">
                <div class="col-md-3">
                    <h3> Statistici Vot</h3>
                    <canvas id="myChart" width="200" height="200"></canvas>
                </div>
            </div>

            <div class="row hidden toHide" id="addVot">
                <div class="col-md-12 m-0 p-0">
                    <h3> Adaugă punct pentru vot</h3>
                    <form action="#" id="register">
                        <section class="col-md-4 form-group m-0 p-0">
                            <label for="name">Titlu</label>
                            <input type="text" id="titleT" name="titleT" class="form-control" placeholder="...">
                        </section>
                        <section class="col-md-4 form-group m-0 p-0">
                            <label for="description">Descriere</label>
                            <input type="text" id="description m-0 p-0" name="description" class="form-control" placeholder="...">
                        </section>
                        <section class="col-md-4 form-group m-0 p-0">
                            <label for="oz">Numărul de pe ordinea de zi</label>
                            <input type="number" id="oz" name="oz" class="form-control" placeholder="..." value=0>
                        </section>
                        <section class="col-md-4 form-group m-0 p-0">
                            <label for="order">Ordine</label>
                            <input type="number" id="order" name="order" class="form-control" placeholder="...">
                        </section>

                        <section class="col-md-4 form-group m-0 p-0">
                            <button class="btn-success btn-sm btn">Salveaza</button>
                        </section>

                    </form>
                </div>
            </div>


            <div class="row hidden toHide" id="viewList">
            <div class="col-md-12"><button class="btn btn-success reloadElement">Caută</button></div>
                <div class="col-md-12">

                    <table id="listTb" class="display" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Nr OZ</th>
                            <th>Titlu</th>
                            <th>Descriere</th>
                            <th>A fost votat</th>
                            <th>Pro</th>
                            <th>Abținere</th>
                            <th>Împotrivă</th>
                            <th>Acțiuni</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row hidden toHide" id="users">
                <div class="col-md-12">
                    <table id="usersTb" class="display" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Access list</th>
                            <th>Account status</th>
                            <th>CCL member</th>
                            <th>Can vote</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row hidden toHide" id="ready">
                <div class="col-md-12">
                    <h3> Adaugă punct pentru vot</h3>
                </div>
            </div>

        </div>



    </div>
    <!-- /#page-content-wrapper -->






</body>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">


<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>



<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: ['Red',  'Yellow', 'Green'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'

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

    myChart.canvas.parentNode.style.height = '128px';
    myChart.canvas.parentNode.style.width = '128px';

    var dataTbl = $("#usersTb").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "users.php",
            "type": "POST"
        },
        "drawCallback": function( settings ) {
            $('.canvote').off('click');
            $('.canvote').on('click', function(){
                var nr = $(this).hasClass('btn-success') ? 0 : 1;
                var text = $(this).text() == 'Da' ? 'Nu' : 'Da';
                var id = $(this).attr('data-id');
                var element = $(this);
                $.ajax({
                    url: 'canvote.php',
                    method:'POST',
                    data:{
                        nr: nr,
                        id : id
                    },
                    success: function(data){
                        if (data[0] == 0){
                            toastr.success('Ai inserat un element pentu vot cu succes!');
                            element.toggleClass('btn-success btn-danger');
                            element.text(text);
                        }else
                            toastr.error('Elementul nu a fost inserat, incearca din nou!');
                    }

                });
            });
        }
    });


    var dataTbl2 = $("#listTb").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "handellist.php",
            "type": "POST"
        },
        "drawCallback": function( settings ) {
            $('.wasVote').off('click');
            $('.wasVote').on('click', function(){
                var nr = $(this).hasClass('btn-success') ? 0 : 1;
                var text = $(this).text() == 'Da' ? 'Nu' : 'Da';
                var id = $(this).attr('data-id');
                var element = $(this);
                $.ajax({
                    url: 'activeList.php',
                    method:'POST',
                    data:{
                        nr: nr,
                        id : id
                    },
                    success: function(data){
                        if (data[0] == 0){
                            toastr.success('Ai activat votul cu succes!');
                            element.toggleClass('btn-success btn-danger');
                            element.text(text);

                        }else
                            toastr.error('Elementul nu a fost activat, incearca din nou!');
                          
                    }

                });
            });
               $('.reloadElement').off('click');
                            $('.reloadElement').on('click', function(){
                            	 $('#listTb').DataTable().ajax.reload();
                            });

            $('.resetVote').off('click');
            $('.resetVote').on('click', function(e){
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    url: 'activeList.php',
                    method:'POST',
                    data:{
                        id : id,
                        reset: true
                    },
                    success: function(data){
                        if (data[0] == 0){
                            toastr.success('Ai resetat votul');
                            $('#listTb').DataTable().ajax.reload();
                        }else
                            toastr.error('Nu ai resetat votul, incearca din nou!');
                    }

                });

            });
        }
    });


    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('.tabAct').off('click');
    $('.tabAct').on('click', function(e){
        e.preventDefault();
        var id = $(this).attr('href');

// 		if (id == '#users'){
// 			$.ajax({
// 				url:'users.php',
// 				dataType:'json',
// 				method: 'POST',
// 				success: function(data){
// 					$(id).append(data);


// 				}
// 			})
// 		}

        $('.toHide').addClass('hidden');
        $(id).removeClass('hidden');
    });

</script>

<script>
    $('#register').off('submit');
    $('#register').on('submit', function(e){
        e.preventDefault();
        var dataForm = $(this).serializeArray();
        var url = "insert.php";
        $.ajax({
            url: url,
            data: dataForm,
            method: 'POST',
            success: function(data){
                console.log(data);

                if (data[0] == 0){
                    toastr.success('Ai inserat un element pentu vot cu succes!');
                }else
                    toastr.error('Elementul nu a fost inserat, incearca din nou!');

            }
        });
    });

    $(document).ready(function(){
        $('.button-left').click(function(){
            $('.sidebar').toggleClass('fliph');
        });

    });
</script>











<?php }else{

    header("location: welcome.php");
}?>