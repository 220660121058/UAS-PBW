<?php
    //persiapan function untuk upload file/foto

    function upload()
    {
        //deklarasi variabel kebutuhan
        $namafile = $_FILES['file']['name'];
        $ukuranfile = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $tmpname = $_FILES['file']['tmp_name'];

        //cek apakah yang di upload file/foto
        $eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
        $eksfile = explode('.', $namafile);
        $eksfile = strtolower(end($eksfile));

        if(!in_array($eksfile, $eksfilevalid)){
            echo "<script> alert('Yang anda upload bukan gambar/file PDF ...!')</script>";
            return false;
        }
        //cek jika ukuran file terlalu besar
        if($ukuranfile > 1000000){
            echo "<script> alert('Ukuran file Anda terlalu besar!')</script>";
            return false;
        }
        
        //jika lolos pengecekan, file siap di upload
        //generate nama file baru

        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksfile;

        move_uploaded_file($tmpname, 'file/'.$namafilebaru);
        return $namafilebaru;
    }
?>