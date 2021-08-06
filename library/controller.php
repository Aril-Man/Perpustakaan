<?php 

    class Controller{


        // Funtion create
        function create($con, $tabel, array $field, $redirect){
        $sql = "INSERT INTO $tabel SET ";
        foreach($field as $key => $value){
            $sql.= " $key = '$value',";
        }
        $sql = rtrim($sql, ',');
        $jalan = mysqli_query($con, $sql);
            if($jalan){
                echo "<script>alert('Berhasil disimpan');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Gagal disimpan');document.location.href='$redirect'</script>";
            }
        }   

        // Funtion show
        function show($con, $tabel){
            $sql = "SELECT * FROM $tabel";
            @$jalan = mysqli_query($con, $sql);
            while(@$data = mysqli_fetch_assoc($jalan))
                $isi[] = $data;
                return @$isi;
        }
        // Funtion Delete
        public function delete($con, $table, $where, $redirect)
        {
            $sql = "DELETE FROM $table WHERE $where";
            $jalan = mysqli_query($con, $sql);

            if ($jalan) {
                echo "<script>alert('Data terhapus');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Gagal Hapus');document.location.href='$redirect'</script>";
            }
        }

        // Funtion Edit
        public function edit($con, $table, $where)
        {
            $sql = "SELECT * FROM $table WHERE $where";
            $jalan = mysqli_query($con, $sql);

            $tampung = mysqli_fetch_assoc($jalan);
            return $tampung;
        }
        // Funtion Update
        function update($con, $tabel, array $field, $where, $redirect){
            $sql = "UPDATE $tabel SET ";
            foreach($field as $key => $value){
                $sql.= " $key = '$value',";
            }
            $sql = rtrim($sql, ',');
            $sql.= " WHERE $where";
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>alert('Berhasil diubah');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Gagal diubah');document.location.href='$redirect'</script>";
            }
        }

    }

?>