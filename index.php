</head>

<body>

    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $foto = $_FILES["foto"];
            if(in_array($foto['type'], ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
                $arquivo = md5(time()).'.jpg';            
                move_uploaded_file($_FILES['foto']['tmp_name'], "arquivos/".$arquivo);
            }
            else {
                echo "Erro ao fazer upload";
            }
        }
    ?>

    <div class="container w-50">
        <form action="" method="post" enctype="multipart/form-data" class="mb-5">
            <h3 class="mt-3 text-center">Foto</h3>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto" required />
            </div>           
            <button type="submit" class="btn btn-primary float-end">Enviar</button>            
        </form>
    </div>

    <?php
        if(isset($arquivo)) {
    ?>
    <div class="container text-center">
        <img src="arquivos/<?php echo $arquivo; ?>" style="height: 400px; width: auto;" />
    </div>        
    <?php
        }
    ?>

</body>

</html>
