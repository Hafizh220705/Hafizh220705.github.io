<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Form Biodata</title>

    <style>
        body {
            font-family: Poppins;
            line-height: 1.6;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
        h1 {
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        $name = $npm = $address = $tempatLahir = $tanggalLahir = $ttl = $gender = $hobby = "";
        $nameError = $npmError = $addressError = $tempatLahirError = $tanggalLahirError =  $genderError = $hobbyError = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])){
                $nameError = "Nama Wajib Diisi!";
            }
            else{
                $name = inputData($_POST["name"]);
                if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                    $nameError = "Hanya Huruf Yang Diperbolehkan!";
                }
            }

            if(empty($_POST["npm"])){
                $npmError = "NPM Wajib Diisi!";
            }
            else{
                $npm = inputData($_POST["npm"]);
                if(!is_numeric($npm)){
                    $npmError = "Hanya Angka Yang Diperbolehkan!";
                }
            }

            if(empty($_POST["address"])){
                $addressError = "Alamat Wajib Diisi!";
            }
            else{
                $address = inputData($_POST["address"]);    
            }

            if(empty($_POST["tempatlahir"])){
                $tempatLahirError = "Tempat Lahir Wajib Diisi!";
            }
            else{
                $tempatLahir = inputData($_POST["tempatlahir"]);
            }

            if(empty($_POST["tanggalLahir"])){
                $tanggalLahirError = "Tanggal Lahir Wajib Diisi!";
            }
            else{
                $tanggalLahir = inputData($_POST["tanggalLahir"]);
            }

            if(empty($_POST["gender"])){
                $genderError = "Gender Wajib Diisi!";
            }
            else{
                $gender = inputData($_POST["gender"]);
            }

            if(empty($_POST["hobby"])){
                $hobbyError = "Hobby Wajib Diisi!";
            }
            else{
                $hobby = inputData($_POST["hobby"]);
            }
        }
    
    function inputData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <header>
        <h1>Form Biodata</h1>
    </header>

    <section>
        <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <p>Nama Lengkap<span class="error">*</span></p>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Masukkan nama lengkap Anda">
                <span class="error"> <?php echo $nameError;?></span>
                <br>
                <p>NPM <span class="error">*</span></p> 
                <input type="text" name="npm" value="<?php echo $npm; ?>" placeholder="Masukkan NPM Anda">
                <span class="error"> <?php echo $npmError;?></span>
                <br>
                <p>Alamat <span class="error">*</span></p> 
                <textarea name="address" rows="3" cols="70" style="resize: none;" placeholder="Masukkan alamat Lengkap Anda"><?php echo $address; ?></textarea>
                <span class="error"> <?php echo $addressError;?></span>
                <br>
                <p>Tempat Lahir <span class="error">*</span></p> 
                <input type="text" name="tempatlahir" value="<?php echo $tempatLahir; ?>" placeholder="Masukkan tempat lahir Anda">
                <span class="error"> <?php echo $tanggalLahirError;?></span>
                <br>
                <p>Tanggal Lahir <span class="error">*</span></p>
                <input type="date" name="tanggalLahir" value="<?php echo $tanggalLahir; ?>">
                <span class="error"> <?php echo $tanggalLahirError;?></span>
                <br>
                <p>Jenis Kelamin <span class="error">*</span></p>
                <div style="display: flex; gap: 10px;">
                    <label>
                        <input type="radio" name="gender" value="Laki-laki" <?php if(isset($gender) && $gender == "Laki-laki") echo "checked" ?>>Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="gender" value="Perempuan" <?php if(isset($gender) && $gender == "Perempuan") echo "checked" ?>>Perempuan
                    </label>
                </div>  
                <span class="error"> <?php echo $genderError;?></span>
                <br>
                <p>Hobi <span class="error">*</span></p>
                <input type="text" name="hobby" value="<?php echo $hobby; ?>" placeholder="Masukkan hobi Anda">
                <span class="error"> <?php echo $hobbyError;?></span>
                <br>
                <input type="submit" name="submit" value="Submit">  
            </form>
        </div>
    </section>
        <br><br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameError && !$npmError && !$addressError && !$tempatLahirError && !$tanggalLahirError && !$genderError && !$hobbyError) {
            $ttl = $tempatLahir . ", " . $tanggalLahir;
            echo "<h2 style=\"text-align: center;\">BIODATA MAHASISWA</h2>";
            echo "<div class='container'>";
            echo "<div class='output'>";
            echo "<table>";
            echo "<tr><td><b>Nama Lengkap</b></td><td>" . strtoupper($name) . "</td></tr>";
            echo "<tr><td><b>NPM</b></td><td>" . $npm . "</td></tr>";
            echo "<tr><td><b>Alamat</b></td><td>" . strtoupper($address) . "</td></tr>";
            echo "<tr><td><b>TTL</b></td><td>" . $ttl . "</td></tr>";
            echo "<tr><td><b>Jenis Kelamin</b></td><td>" . $gender . "</td></tr>";
            echo "<tr><td><b>Hobi</b></td><td>" . $hobby . "</td></tr>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</body>
</html>