<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <title>Monitoring Suhu Sensor</title>

    <!-- jQuery for realtime updates -->
    <script type="text/javascript" src="{{('jquery/jquery.min.js')}}"></script>

    <!-- Script for realtime data loading -->
    <script type="text/javascript">
      $(document).ready(function() {
        setInterval(function() {
          // Ambil data suhu dan kelembaban
          $.get("{{ url('bacasuhu') }}", function(data) {
            $('#suhu').text(data);
            $('#suhu-icon').css('height', data + '%'); // Update tinggi ikon sesuai suhu
          });

          $.get("{{ url('bacakelembaban') }}", function(data) {
            $('#kelembaban').text(data);
            $('#kelembaban-icon').css('height', data + '%'); // Update tinggi ikon sesuai kelembaban
          });
        }, 1000); // Update setiap 1 detik
      });
    </script>
  </head>
  <body>
    <!-- Header Section -->
    <div class="container text-center mt-5">
      <img src="{{'images/LaravelLogo.png'}}" class="mb-3" style="width: 150px;">
      <h2>Monitoring Nilai Sensor secara Realtime <br> Menggunakan Framework Laravel</h2>
    </div>

    <!-- Sensor Values Section -->
    <div class="container mt-4">
      <div class="row text-center">
        <!-- Suhu Section -->
        <div class="col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-header bg-danger text-white">
              <h4>SUHU</h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center align-items-center">
                <i class="bi bi-thermometer-half text-danger" style="font-size: 80px;" id="suhu-icon"></i>
                <h3 class="ms-3"><span id="suhu"></span>°C</h3>
              </div>
            </div>
          </div>
        </div>

        <!-- Kelembaban Section -->
        <div class="col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-header bg-primary text-white">
              <h4>KELEMBABAN</h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center align-items-center">
                <i class="bi bi-droplet-half text-primary" style="font-size: 80px;" id="kelembaban-icon"></i>
                <h3 class="ms-3"><span id="kelembaban"></span>%</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
    function getData (){
        $.getJSON("{{ route('bacasuhu') }}",
            function (data, textStatus, jqXHR) {
              console.log(data);
              
                $("#kelembaban").html(data.kelembaban);
                $("#suhu").html(data.suhu);
            }
        );
    }

    $(document).ready(function () {
        setInterval(() => {
            getData();
        }, 1000);
    });
</script>
  </body>
</html>
