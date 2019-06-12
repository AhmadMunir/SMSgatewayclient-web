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
                    <h1 class="page-header">Pulsa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php foreach ($pulsa as $k){
              $jns = $k->nama_produk;?>
                  <div class="col-lg-3 col-md-6">
                      <div class="panel
                      <?php if ($jns == "Axis") {
                        echo "panel-primary";
                      }elseif ($jns == "Telkomsel") {
                        echo "panel-red";
                      }elseif ($jns == "Im3") {
                        echo "panel-yellow";
                      }elseif ($jns == "3") {
                        echo "panel-default";
                      }elseif ($jns == "Xl") {
                        echo "panel-green";
                      } ?>">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                    <img width="80" height="80"
                                    src="  <?php if ($jns == "Axis") {
                                        echo base_url('img/axis.png');
                                      }elseif ($jns == "Telkomsel") {
                                        echo base_url('img/tlkmsl.png');
                                      }elseif ($jns == "Im3") {
                                        echo base_url('img/im3.png');
                                      }elseif ($jns == "Tri") {
                                        echo base_url('img/Tri.png');
                                      }elseif ($jns == "Xl") {
                                      echo base_url('img/xl.png');
                                      } ?>"></img>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge">Pulsa</div>
                                      <div><?php echo $k->nama_produk;?></div>
                                  </div>
                              </div>
                          </div>
                          <a href="<?php echo base_url('Home/pulsa/'.$jns); ?>">
                              <div class="panel-footer">
                                  <span class="pull-left">View Details</span>
                                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>
                      </div>
                  </div>
                <?php } ?>

          </div>
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Paket Data</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
          <div class="row">
          <?php foreach ($paket as $ke){
            $jns = $ke->nama_produk;?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel
                    <?php if ($jns == "Axis") {
                      echo "panel-primary";
                    }elseif ($jns == "Telkomsel") {
                      echo "panel-red";
                    }elseif ($jns == "Im3") {
                      echo "panel-yellow";
                    }elseif ($jns == "3") {
                      echo "panel-default";
                    }elseif ($jns == "Xl") {
                      echo "panel-green";
                    } ?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                  <img width="80" height="80"
                                  src="  <?php if ($jns == "Axis") {
                                      echo base_url('img/axis.png');
                                    }elseif ($jns == "Telkomsel") {
                                      echo base_url('img/tlkmsl.png');
                                    }elseif ($jns == "Im3") {
                                      echo base_url('img/im3.png');
                                    }elseif ($jns == "Tri") {
                                      echo base_url('img/Tri.png');
                                    }elseif ($jns == "Xl") {
                                    echo base_url('img/xl.png');
                                    } ?>"></img>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div>Paket Data</div>
                                    <div><?php echo $ke->nama_produk;?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('Home/paket/'.$jns); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              <?php } ?>

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
    <script>  function startApp() {
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
          var message = document.getElementById("message").value;

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
                // log.textContent = log.textContent + "\n" +
                //  "Laporan sukses : " + response.message;

                 $.ajax({
                    url:  "<?php echo base_url('index.php/Home/pulsa/simpansukses'); ?>",
                    type: "post",
                    data: $("#form_beli").serialize(),
                    success: function(data){
                      alert("Selamat Pembelian Sukses!");
                    }

                 });


              }else {
                log.textContent = log.textContent + "\n" +
                "Laporan gagal : " + response.message;
                $.ajax({
                   url:  "<?php echo base_url('index.php/Home/pulsa/simpangagal'); ?>",
                   type: "post",
                   data: $("#form_beli").serialize(),
                   success: function(data){
                     alert("Aduuh, Pembelian gagal!");
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
