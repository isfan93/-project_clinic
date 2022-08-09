<html>

<head>
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Klinik ABC</b></span></br>
                Alamat : Jl baru Jadi No 20020 </br>
                Telp : 0594094545
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>Nota Transaksi</span></b></br>
                No Trans. : 4</br>
                Tanggal : <?= date('d F Y') ?> </br>
            </td>
        </table>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <?php
            session_start();
            include 'config.php';
            $no = 1;
            $no_rm = $_GET['no_rm'];

            $sql = mysqli_query($conn, "SELECT * FROM trans_tindakan WHERE no_rm = '$no_rm'");

            $d = mysqli_fetch_array($sql);

            ?>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                Nama Pasien : <?= $d['nama_px']; ?></br>
                Alamat : -
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                No Telp : -
            </td>
        </table>
        <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

            <tr align='center'>
                <td width='5%'>No</td>
                <td width='20%'>Tindakan dan Obat</td>
                <td width='13%'>Harga</td>

            </tr>
            <tr>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM trans_tindakan WHERE no_rm = '$no_rm'");
                $sql2 = mysqli_query($conn, "SELECT SUM(harga) as subtot FROM trans_tindakan WHERE no_rm ='$no_rm'");
                $tot1 = mysqli_fetch_array($sql2);

                while ($byrt = mysqli_fetch_array($sql)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $byrt['nama_tindakan']; ?></td>
                <td>Rp. <?= $byrt['harga']; ?></td>
            </tr>
        <?php } ?>
        <!-- <td style="background-color: blue ; font-size: 20px;">Sub Total </td>
                                                <td style="background-color: blue ;"></td>
                                                <td style="background-color: blue ; font-size: 20px;"><?= $tot1['subtot']; ?></td> -->

        <?php
        $sql = mysqli_query($conn, "SELECT * FROM trans_obat WHERE no_rm = '$no_rm'");
        $sql2 = mysqli_query($conn, "SELECT SUM(harga) as subtot FROM trans_obat WHERE no_rm ='$no_rm'");
        $tot2 = mysqli_fetch_array($sql2);
        while ($byrt = mysqli_fetch_array($sql)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $byrt['nama_obat']; ?></td>
                <td>Rp. <?= $byrt['harga']; ?></td>
            </tr>
        <?php } ?>
        </tr>


        <tr>
            <?php
            $total = $tot1['subtot'] + $tot2['subtot'];
            ?>
            <td colspan='2'>
                <div style='text-align:left'>Total Yang Harus Di Bayar Adalah : </div>
            </td>
            <td style='text-align:left'>Rp. <?= $total; ?></td>
        </tr>

        <!-- <tr>
            <td colspan='2'>
                <div style='text-align:right'>Cash : </div>
            </td>
            <td style='text-align:right'>Rp2.460.000,00</td>
        </tr>
        <tr>
            <td colspan='2'>
                <div style='text-align:right'>Kembalian : </div>
            </td>
            <td style='text-align:right'>Rp0,00</td>
        </tr> -->

        </table>
        <br>
        <table style='width:650; font-size:7pt;' cellspacing='2'>
            <tr>
                <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
                <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
                <td align='center'>TTD,</br></br><u>(<?= $_SESSION['level']; ?>)</u></td>
            </tr>
        </table>
    </center>
</body>

</html>