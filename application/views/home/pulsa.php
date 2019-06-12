<!DOCTYPE html>
<html>
<head>
<title>Aplikasi Web ULTIMATE</title>
</head>
<body>
<h1>Aplikasi Web ULTIMATE</h1>
<label for="to">To :</label> <br/>
<input type="text" id="to"/> <br/>
<label for="message">Message :</label> <br/>
<textarea id="message" cols="20" rows="5"></textarea> <br/>
<button id="send">Send SMS</button>
<br/><br/>
<label for="log">Log</label> <br/>
<textarea id="log" cols="50" rows="5"></textarea> <br/>
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
          log.textContent = log.textContent + "\n" +
           "Laporan sukses : " + response.message;
        }else {
          log.textContent = log.textContent + "\n" +
          "Laporan gagal : " + response.message;
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
