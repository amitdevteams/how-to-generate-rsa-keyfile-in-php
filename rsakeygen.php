<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $res = openssl_pkey_new();
  // Get private key
  openssl_pkey_export($res, $privkey, "PassPhrase number 1"); {
    // Get details of public key
    $pubkey = openssl_pkey_get_details($res);
    $pubkey = $pubkey["key"];
    file_put_contents('privatekey.pem', $privkey);
    

    // var_export($pubkey, $return)
    // var_dump($privkey);
    // var_dump($pubkey);
  }
}
?>


<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>RSA KEY Generator</title>
</head>
<body>
  <div class="container">
    <div class="my-5">
      <form action="./rsagen.php" method="POST">
        <div class="row row-cols-2">
          <div class="p-3">
            <label for="privatekey">Private Key</label>
            <textarea class="form-control" name="privatekey" id="privatekey" rows="3">
                          <?php echo $privkey ?? null ?></textarea>
          </div>
          <div class="p-3">
            <label for="publickey" class="form-lable">Public Key</label>
            <textarea class="form-control" name="publickey" id="publickey" rows="3"><?php echo $pubkey ?? null ?></textarea>
          </div>
          <div class="mt-5 text-end">
            <button class="btn btn-primary">Generate</button>
          </div>
        </div>
      </form>
      <br><br>
      <!-- <button class="btn btn-primary" value="">Download Public Key</button> -->
      <a href="<?php echo $pubkey ?? null ?>">Download Public key</a>

    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 
</body>
</html>
