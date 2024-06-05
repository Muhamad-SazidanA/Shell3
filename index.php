<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
    <title>Shell</title>
</head>
<body>
    <style>
        *{
            margin:0;
            padding: 0;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            background: #e4e9f7;
        }

        .atas {
            display: flex;
            justify-content: center;
            background-color: rgba(76,68,182,0.808);
            color: white;
            border-radius: 0 0 20px 20px;
            margin: 0 48px;
            padding: 15px 24px;
        }

        .container{
            width: 800px;
            height: 400px;
            background: #d4d8e5;
            margin-top: 40px;
            border:3px solid #fff;
            border-radius: 8px;
            padding: 50px 100px;
        }

        .Inputan h1{
            text-align: center;
            padding: 20px;
        }


        .ContainerStruck{
            width: 500px;
            height: auto;
            background: #d4d8e5;
            border:1px solid #000;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .Struck{
            padding: 30px;
            text-align: center;
        }

        .Buttene{
            display: flex;
            justify-content: center;
            padding:30px;
        }
    </style>
    <header class="atas">
        <h2>313 Ansa Shell</h2>
    </header>
    <div class="container">
        <div class="Inputan">
            <form action="" method="post" id="">
                <h1><b>Shell</b></h1>
                <div class="">
                    <label for="banyakshell" class="form-label">Liter :</label>
                    <input type="number" name="banyakshell" id="banyakshell" class="form-control" min="0 "max="100000000" >
                </div>
                <div class="">
                    <label for="jenisshell" class="form-label">Jenis :</label>
                    <select type="name" name="jenisshell" id="jenisshell" class="form-control">
                        <option value="S Super">Shell Super</option>
                        <option value="S V-Power">Shell V-Power</option>
                        <option value="S V-Power Diesel">Shell V-Power Diesel</option>
                        <option value="S V-Power Nitro">Shell V-Power Nitro</option>
                    </select>
                    <br>
                    <button type='submit' class='btn btn-secondary'><i class='bx bxs-printer'></i> Bayar&Cetak Struck</a></button>
                </div>
            </form>
        </div>
    </div>
        <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            class shell
            {
                protected $banyakshell;
                protected $jenisshell;
                protected $pajak;
                protected $data_shell = ["S Super" => 15420, "S V-Power" => 16130, "S V-Power Diesel" => 18310, "S V-Power Nitro" => 16510];

                public function __construct($banyakshell, $jenisshell, $pajak)
                {
                    $this->banyakshell = $banyakshell;
                    $this->jenisshell = $jenisshell;
                    $this->pajak = $pajak;
                }

                public function getbanyakshell()
                {
                    return $this->banyakshell;
                }

                public function getjenisshell()
                {
                    return $this->jenisshell;
                }
            }
            class buy extends shell
            {
                public function getTotal()
                {
                    return $this->banyakshell * $this->data_shell[$this->jenisshell] * (1 + $this->pajak);
                }
            }
            $buybensin = new buy($_POST["banyakshell"], $_POST["jenisshell"], 0.1);
            $totalharga = $buybensin->getTotal();
            echo "<div class='ContainerStruck'>";
            echo "<div class='Struck'>";
            echo "<h4>313 Ansa Shell</h4>";
            echo "Jl. Ketikung Dua, Kecamatan NT <br> Bandar Hati <br>";
            echo "<hr style='border: 1px dashed #000;'>";
            echo "Jenis Bahan Bakar : " . $buybensin->getjenisshell() . "<br>";
            echo "Jumlah liter yang dibeli : " . $buybensin->getbanyakshell() . " Liter <br>";
            echo "Total yang harus dibayarkan Rp. " . number_format($totalharga, 0, ',', '.') . "<br>";
            echo "<hr style='border: 1px dashed #000;'>";
            echo "Terima Kasih <br> Atas Kunjungannya<br>";
            echo "<hr style='border: 1px dashed #000;'>";
            echo "</div>";
            echo "</div>";
            echo "<div class='Buttene'>";
            echo "<button type='submit' class='btn btn-primary'><a href='index.php' style='text-decoration: none; color: white;'><i class='bx bx-left-arrow-alt'></i> Kembali  </a></button>";
            echo "</div>";
            echo "<br>";
        }
        ?>
    <br>
</body>
</html>