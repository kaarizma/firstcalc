<!DOCTYPE html>
<html>
<style>
    input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    /* deneme*/
    }

    input[type=submit] {
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
</style>
<body>

    <?php
    
    if (isset($_POST["gonder"])) {
    
        if (is_numeric($_POST["sayi1"]) == 1) {
            $sayi1 = $_POST["sayi1"];
        }else {
            $err1 = "Sayı 1'e lütfen sadece sayı yazınız.";
            $sayi1 = NULL;
        }
        if (is_numeric($_POST["sayi2"]) == 1) {
            $sayi2 = $_POST["sayi2"];
        }else {
            $err2 = "Sayı 2'ye lütfen sadece sayı yazınız.";
            $sayi2 = NULL;
        }
        $islem = $_POST["islem"];
        switch ($islem) {
        case 'topla':
            $sonuc = $sayi1 + $sayi2;
            break;
        case 'cikar':
            $sonuc = $sayi1 - $sayi2;
            break;
        case 'carp':
            $sonuc = $sayi1 * $sayi2;
            break;
        case 'bol':
            $sonuc = $sayi1 / $sayi2;
            break;
        }
    }
    ?>

    

<div style="text-align: center">
  <form action="calc1.php" method="POST">
    <label for="fname">1. Sayı</label>
    <input type="text" required name="sayi1" placeholder="<?php if (isset($_POST["gonder"])){
        if (is_numeric($_POST["sayi1"]) == 0){
            echo $err1;

        }else {
            echo $sayi1;
        }

    }
    ?>"> <br>

    <label for="lname">2. Sayı  </label>
    <input type="text" required name="sayi2" placeholder="<?php if (isset($_POST["gonder"])){
        if (is_numeric($_POST["sayi2"]) == 0){
            echo $err2;

        }else {
            echo $sayi2;
        }

    }
    ?>"> <br>
    <label for="country">İşlem</label>
    <select  name="islem">
            <option <?php if(isset($_POST["gonder"]) && $islem == "topla") echo"selected" ?> value="topla">+</option>
            <option <?php if(isset($_POST["gonder"]) && $islem == "cikar") echo"selected" ?> value="cikar">-</option>
            <option <?php if(isset($_POST["gonder"]) && $islem == "carp") echo"selected" ?> value="carp">*</option>
            <option <?php if(isset($_POST["gonder"]) && $islem == "bol") echo"selected" ?> value="bol">/</option>

        
    </select> <br>

    <?php
    
    if(isset($_POST["gonder"])){
    
    ?>
    <label for="lname">Sonuç = </label>
    <input type="text" disabled name="sonuc" placeholder="<?php if (isset($_POST["gonder"])) echo $sonuc; ?>"> <br>

    <?php  
        }
        ?>
    <input type="submit" name="gonder" value="Gönder">
  </form>
</div>

</body>
</html>


