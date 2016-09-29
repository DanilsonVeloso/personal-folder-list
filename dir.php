<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="/res/font/flaticon.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <title>Localhost<?php echo substr($_SERVER['PHP_SELF'], 10);?></title>
    <style>
        *{margin: 0;padding: 0;font-family: 'Roboto', sans-serif;font-weight: 300;font-size: 100%;box-sizing: border-box;-webkit-box-sizing: border-box;text-decoration: none;}
        ul{list-style: none;margin-top: 10px;}
        li{width: 100%;padding: 5px;}
        li:hover{background-color: #eee;}
        li a{color: #777;margin: 5px;}
        .flaticon-folder-1{color: #e29f20;}
        .header{ width: 100%; padding: 10px; background-color: #000; color: #fff; font-size: 1.2em; font-weight: 400;}
        
    </style>
</head>

<body>
    <div>
        <?php
        ////////////////////////////////////
        ///                              ///
        /// O código não está otimizado  ///
        ///                              ///
        ////////////////////////////////////
        
        
        //Direório atual
        $path = "./";
        $dir = dir($path);
        //Array com extensões de arquivos comuns
        $exts = array(
            'html' => '.html',
            'php' => '.php',
            'css' => '.css',
            'jpeg' => '.jpg',
            'png' => '.png',
            'js' => '.js',
            'txt' => '.txt'
        );
        //Imprime o header com as informações de diretório
        echo "<div class='header'>";
        echo "Lista de pastas e arquivos em <em>{$_SERVER["REQUEST_URI"]}</em>.";
        echo "</div>";
        
        echo "<ul>";
        while($file = $dir->read()){      
            //Busca uma extensão válida do arquivo
            $ext = strrchr($file, '.');
            //Pega a extensão do arquivo
            $type = substr($ext, -5);
            //Obtém o tamanho da extensão
            $ext_len = strlen($type);
            //Busca a extensão no array de extensões
            $search_file = array_search($type, $exts);
            
            //Verifica se é um arquivo ou uma pasta, depois adiciona o icone de pasta
            if($ext_len < 1 || $file == '.' || $file == '..'){
                echo "<li><i class='flaticon-folder-1'></i><a href='$path$file'>$file</a></li>";
            }
            //Verifica se a extensão existe no array, caso não exista adiciona o icone do tipo
            if(!$search_file && $ext_len > 0 && $file != '.' && $file != '..'){
                echo "<li><i class='flaticon-file'></i><a href='$path$file'>$file</a></li>";
            }
            
            //Adiciona o icone de acordo com a extensão
            switch($ext){
                case $exts['html']:
                    echo "<li><i class='flaticon-file-7'></i><a href='$path$file'>$file</a></li>";
                    break;
                case $exts['php']:
                    echo "<li><i class='flaticon-php'></i><a href='$path$file'>$file</a></li>";
                    break;
                case $exts['css']:
                    echo "<li><i class='flaticon-css'></i><a href='$path$file'>$file</a></li>";
                    break;
                case $exts['jpeg']:
                    echo "<li><i class='flaticon-jpg'></i><a href='$path$file'>$file</a></li>";
                    break;
                case $exts['png']:
                    echo "<li><i class='flaticon-png'></i><a href='$path$file'>$file</a></li>";
                    break;
                case $exts['js']:
                    echo "<li><i class='flaticon-coding'></i><a href='$path$file'>$file</a></li>";
                    break;
                case $exts['txt']:
                    echo "<li><i class='flaticon-txt'></i><a href='$path$file'>$file</a></li>";
                    break;
            }
            
        }
        $dir->close();
        echo "</ul>";
        ?>
    </div>
</body>

</html>