
<!DOCTYPE html>
<html>
<head>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./main.css">
	<title>upload.io</title>    
</head>
<body>

    <?php include './components/header.php' ?>;
    <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <form action="#" method="post" enctype="multipart/form-data">
                <label class="form-label">Upload Image: </label>
                <input class="form-control form-control-lg" type="file" name='myfile'>
                <br/>
                <label class="form-label">Password: </label>
                <input class="form-control form-control-lg" type="password" name="password">
                <br>
                <div class="d-grid gap-2">                
                    <input class="btn btn-dark" type="submit" value="Upload">
                </div>  
                
            </form>
        </div>
    </div>
</body>
</html>

<style>

</style>

  <?php
                         
                          

    if(isset($_POST['password'])){
        $password=$_POST['password'];

        // Change this Password
        if($password=="shadow12"){
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
              
            
            $image=$_FILES['myfile'];    

            if (!file_exists("files/".date("d-m-y"))) {
                mkdir("files/".date("d-m-y"), 0777, true);
            }
            

            $image['name'] = preg_replace("/[\s_]/", "-",$image['name']);

            $filename = "files/".date("d-m-y")."/".date("Ymdgis").'-'.$image['name'];

            move_uploaded_file($image['tmp_name'],$filename);

            $download_link = $url."/".$filename;

            echo '<div class="alert alert-success" role="alert">
                    <input class="form-control form-control-md" value="'.$download_link.'" id="link">
                    
                    <button onclick="copyToClipboard()" class="btn btn-outline-success">
                        Copy Link to Clipboard
                    </button>
                  </div>';
        }else{
            
            echo '<div class="alert alert-danger" role="alert">
                    Upload Failed! Wrong Password...
                  </div>';

        }

     
    }
    ?>

    <script>
        function copyToClipboard() {
             
            document.getElementById("link").select();
            document.execCommand('copy');            
        }
    </script>

