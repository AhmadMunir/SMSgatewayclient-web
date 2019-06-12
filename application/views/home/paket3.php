<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view('home/_partials/head') ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php $this->load->view('home/_partials/navbar') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Paket Data Tri</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <label for="to">Nomor :</label> <br/>
              <input type="text" id="to" placeholder="Masukkan Nomor Yang Akan Diisi Paket Data"/> <br/><br>
              <label for="nominal">Nominal Pengisian</label> <br>
              <select name="message" id="message" style="width: 200px;">
                <option value="">Pilih</option>
                <?php
                foreach ($paket as $data) { // Lakukan looping pada variabel siswa dari controller
                    echo "<option value='$data->besaran'>".$data->besaran."</option>";
                }
                ?>
              </select>
              <br><br><br>
              <button id="send">Send SMS</button>
          </div>

        </div>
        <!-- /#page-wrapper -->
        <!-- Sticky Footer -->
        <?php $this->load->view("home/_partials/footer.php") ?>


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>assets/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>assets/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url() ?>js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="<?php echo base_url() ?>js/sb-admin-2.js"></script>

<script>
function startApp() {
  //buat WebSocket
  var client = new WebSocket("ws://192.168.43.1:6868");

  client.onopen = function (event) {
    var log = document.getElementById("log");
    log.textContent = log.textContent + "\n" + "koneksi ke Server berhasil";
  };

  client.onclose = function (event){
    var log = document.getElementById("log");
    log.textContent = log.textContent + "\n" + "Koneksi ke server terputus";
  };

  client.onerror = function (event){
    var log = document.getElementById("log");
    log.textContent = log.textContent + "\n" + "Koneksi ke Server Error";
  };

  document.getElementById("send").onclick = function () {
  // mengambil value no tujuan

    //no tujuan
    var to = document.getElementById("to").value;

    //isi pesan
    var message = 'Pengisian Paket Data Tri Senilai '+document.getElementById("message").value+' berhasil! Jangan pernah bosan ya beli di SIPULsa company';

    var splits = to.split(",");
    if (splits.length == 1) {
      //bkn bc
      // membuat json
      var json = {
        to: splits[0],
        message: message
      };
      client.send(JSON.stringify(json));

    }else {
        //bc

        var json = {
          to: splits,
          message: message
        };

        client.send(JSON.stringify(json));
    }

  }

  // handler on Messages

  client.onmessage = function (event){
    var response = JSON.parse(event.data);

    switch (response.type) {
      case "success":
        //sms sukses
        alert(response.message);
        break;
      case "error":
        //sms gagal
        alert(response.message)
        break;
      case "notification":
        //laporan sms status SMS
        var log = document.getElementById("log");
        if (response.success) {
          log.textContent = log.textContent + "\n" +
           "Laporan sukses : " + response.message;
           var ke = document.getElementById("to").value;
           var besaran = document.getElementById("message").value
           $.ajax({
              url:  "<?php echo base_url('index.php/Home/paket/simpansukses'); ?>",
              type: "post",
              data: {nama_produk:'Tri', ke:ke, besar:besaran,jenis:'Paket Data'},
              success: function(data){
                alert("Selamat Pembelian Sukses!");
              }
           });
        }else {
          log.textContent = log.textContent + "\n" +
          "Laporan gagal : " + response.message;
          var ket = response.message;
          var ke = document.getElementById("to").value;
          var besaran = document.getElementById("message").value;
          $.ajax({
             url:  "<?php echo base_url('index.php/Home/paket/simpangagal'); ?>",
             type: "post",
             data: {nama_produk:'Tri', ke:ke, besar:besaran, ket:ket,jenis:'Paket Data'},
             success: function(data){
               alert("Aduuh Pembelian GAGAL, Sepertinya ada masalah!");
             }
          });
        }
        break;
      case "received":
        if (confirm("SMS dari " + response.from + " : \n"
      + response.message + "\n" + "Apakah ingin dibalas?")) {
          document.getElementById("to").value = response.from;
        }
        break;
    }
  }

}

window.onload = startApp;

//aksi tombol send
</script>
</body>

</html>
