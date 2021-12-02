<?php 
include_once "scramblerf.php";
$task = 'encode';
if(isset($_GET['task']) && $_GET['task']!=''){
    $task = $_GET['task'];
}
$original_key = 'abcdefghijklmnopqrstuvwxyz1234567890';
$key = 'abcdefghijklmnopqrstuvwxyz1234567890';
if ('key'==$task) {
    $key_original = str_split($key);
    shuffle($key_original);
    $key = join('', $key_original);
}else if (isset($_POST['key']) && $_POST['key']!='') {
   $key = $_POST['key'];
}
$scrambleData = '';
 if ('encode' == $task) {
     $data = $_POST['data']??'';
   if($data != ''){
        $scrambleData = scrambleData($data, $key);
      }
    }
    if ('decode' == $task) {
        $data = $_POST['data']??'';
      if($data != ''){
           $scrambleData = decodeData($data, $key);
         }
       }
    
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dataScramPHP</title>
    <!-- bootstrap stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body><br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Scrambler</h1>
                <h6>use this application to Scrambler your data</h6>
                <h6><a href="/index.php?task=encode">Encode</a>||<a href="/index.php?task=decode">Decode</a>||<a href="/index.php?task=key">Generate Key</a></h6>
                <br>
                <form action="index.php<?php if('decode'==$task){ echo "?task=decode" ;} ?>" method="POST">
                    <h2>Key</h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Key" name="key" aria-label="Key" id="key"
                            <?php displayKey($key); ?>>
                    </div>
                    <h2>Data</h2>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Data" name="data" id="data" aria-label="With textarea"><?php if(isset($_POST['data'])){echo $_POST['data'];} ?> </textarea>
                    </div>
                    <h2>Result</h2>
                    <div class="input-group">
                        <textarea placeholder="Result" class="form-control" aria-label="With textarea"> <?php echo $scrambleData; ?></textarea>
                    </div>
                    <br>
                    <input type="submit" value="make it" class="btn btn-outline-primary btn-lg">
                </form>
            </div>
        </div>
    </div>








    <!-- bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- bootstrap Separate -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>