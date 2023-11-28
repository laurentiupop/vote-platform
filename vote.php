<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

$usrId = $_SESSION['usr_id'];
$sql = "SELECT sct.* FROM `for_vot` as sct WHERE sct.id NOT IN(SELECT vot_id FROM users_votes where usr_id = $usrId) AND rejected = 0 AND was_voted = 0";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);



?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .btn span.glyphicon {
        opacity: 0;
    }
    .btn.active span.glyphicon {
        opacity: 1;
        font-size: 15px;
    }

    #vote input{
        display:none;
    }

    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        font-style: normal;
        font-weight: 400;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .votArange{
        border: 1px solid gainsboro;
        border-radius: 10px;
        height: 130px;
        width: 180px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
        padding: 28px 82px!important;
        border-radius: 0 0 10px 10px!important;
    }

    .btn-warning {
        color: #fff;
        background-color: #f0ad4e;
        border-color: #eea236;
        padding: 28px 82px!important;
        border-radius: 0 0 10px 10px!important;
    }

    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
        padding: 28px 82px!important;
        border-radius: 0 0 10px 10px!important;
    }

    .titleStyle{
        color: white;
        margin: 26px 30px 26px 14px;
        text-align: center;
    }


    .my-2{
        margin-top:7px;
        margin-bottom:7px;
    }

    @media only screen and (max-width: 500px) {
        .toCenter{
            text-align: center;
        }

        .titleStyle{
            display: none;
        }
    }

</style>
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav" style="height: 84px;background-image: linear-gradient(to left, #516630, #425427, #34431f, #263316, #1a230d);">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="http://ag.scoutmures.ro">
            <img height="50px" src="img/logo.png">
        </a>


        <h2 class="titleStyle">Sistem de vot 1.0</h2>

    </div>
</nav>

<div class="container">
    <?php
    foreach ($row as $rowDTO){?>


    <div class="row toCenter my-1" style="font-size: 18px;"><b>Titlu:</b> <?php echo $rowDTO['titlu'] ?></div>
    <div class="row toCenter my-1" style="font-size: 18px;"><b>Descriere:</b> <?php echo $rowDTO['description'] ?></div>
    <div class="row toCenter my-1" style="font-size: 18px;"><b>Punct pe OZ :</b> <?php echo $rowDTO['nr_pct_oz'] ?></div>
    <hr>
    <div class="row pt-3">
        <form data-id="<?php echo $rowDTO['id'] ?>" id="vote">
            <section class="col-md-4 col-sm-12 my-2">
                <div class="votArange">
                    <h3>Votez pentru</h3>
                    <label class="btn btn-success">
                        <input id="daVT" name="vote" type="radio" autocomplete="off">
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
            </section>
            <section class="col-md-4 col-sm-12 my-2">
                <div class="votArange">
                    <h3>Mă abțin</h3>
                    <label class="btn btn-warning">
                        <input id="abtineVT" name="vote" type="radio" autocomplete="off">
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
            </section>
            <section class="col-md-4 col-sm-12 my-2">
                <div class="votArange">
                    <h3>Votez împotrivă</h3>
                    <label class="btn btn-danger">
                        <input id="nuVT" name="vote" type="radio" autocomplete="off">
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                </div>
            </section>

            <section class="col-md-12 col-sm-12">
                <button class="btn btn-sm btn-primary" style="float: right;margin-top:40px;font-size: 15px;padding: 10px 23px;">Votez!</button>
            </section>
        </form>
    </div>
</div>
<?php }?>

<div class="row pt-3" style="display: block; height: 100px;"></div>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css' rel='stylesheet' type='text/css'>

<script>
    $('input[name="vote"]').off('click');
    $('input[name="vote"]').on('click', function(){
        $('input[name="vote"]').parent().removeClass('active');
        $(this).parent().addClass('active');
    });

    $('#vote').off('submit');
    $('#vote').on('submit', function(e){
        e.preventDefault();

        var id = $(this).attr('data-id')
        var usr = '<?php echo $_SESSION['usr_id']?>';
        var da = $('#daVT').prop('checked')
        var abt = $('#abtineVT').prop('checked')
        var nu = $('#nuVT').prop('checked')

        $.ajax({
            url: 'sendvote.php',
            method:'POST',
            data: {
                id:id,
                usr:usr,
                da: da,
                abt: abt,
                nu:nu
            },
            success: function(data){
                if(data[0] == 0){
                    toastr.success('Ai votat cu succes acest punct');
                    $('#vote').remove();
                }else{
                    toastr.error(data[1]);

                }
            }
        });
    });


</script>
