<?php
    $lugar = '../ccs';// le asigno a la variable $lugar los caracteres nesesarios para completar la ruta hacia mi archivo css

    require_once('../html/encavezado.html');

/*+++++++++++++++++++++++++++++++++++++++++++++++++   Control   ++++++++++++++++++++++++++++++++++++++++++++++*/

    if (!empty($_POST['nombre'])) {
        $carpeta ='../txt';
        $nombre_archivo = "datos.txt";
        if (!file_exists($carpeta)) {     //----> Mediante file_exists verifico la existencia de la carpta que contendra a mi archivo de texto plano, negado para que Si No existe tal direccion entre por el camino del 'SI'
            mkdir($carpeta);      //-----> Con mkdir lo que ago es crear la carpeta txt en la direccion contenida en la variable $carpeta.
        }

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/ 

        
/*++++++++++++++++++++++++++++++++++++++++++++++   Juego 9 y 1/2   +++++++++++++++++++++++++++++++++++++++++++++*/

        $minRand = 1;
        $maxRand = 12; 
        $carta1 = 0;
        $carta2 = 0;
        $resultado = 0;

        
        $primerCarta= mt_rand($minRand, $maxRand);
        $segundaCarta= mt_rand($minRand, $maxRand);

        if (  $primerCarta <= 12 && $primerCarta >=10 ){
            switch ($primerCarta){
                case $primerCarta==10:
                    $carta1='Sota';
                    break;
                case $primerCarta==11:
                    $carta1='Caballo';
                    break;
                case $primerCarta==12:
                    $carta1='Rey';
                    break;
            } //mediante este segun le asigno el nombre correspondiente a la carta en caso de que sea un 10, 11 o 12 
            $primerCarta=0.5;
        }
        else {
            $carta1=$primerCarta;
        }
        //A travez de esta estructura de seleccion lo que ago es asiganarle los nombre a la carta, y ademas al estar entre 10 y 12 significa que en el juego no suma mas que medio punto, por lo cual le asigno el valor numerico de 0.5
        //las variables $primerCarta y $segundaCarta contienen los valores numericos de las cartas (para sumar los puntos). Mientras de que las variables $carta1 y $carta2 puede llegar a contener ya sea valores numericos o ser una cadena de caracteres (ya que son las variables que voy a mostrar para hacer saber que cartas salieron)

        if ( $segundaCarta<= 12 && $segundaCarta>=10 ){

            switch ($segundaCarta){
                case $segundaCarta==10:
                    $carta2='Sota';
                    break;
                case $segundaCarta==11:
                    $carta2='Caballo';
                    break;
                case $segundaCarta==12:
                    $carta2='Rey';
                    break;
            }
            $segundaCarta=0.5;
        }
        else{
            $carta2=$segundaCarta;
        }

        $resultado= $segundaCarta + $primerCarta;
        echo '<article class="Articulo2">';
        echo '<h2>9 y Medio</h2>';
        echo '<hr>';
        echo '<p><strong> Bienbenido '.$_POST["nombre"]. '</strong></p>';
        echo '<p> Naipe 1:<strong> ' . $carta1 . '</strong></p>';
        echo '<p> Naipe 2:<strong> ' . $carta2 . ' </strong></p>';
        if ($resultado==9.5) {
            echo '<p><strong>GANADOR</strong></p>';

        }
        else{
            echo '<p>PUNTOS OBTENIDOS:<strong> ' . $resultado . '</strong></p>';
        }

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/       

        

    ?>
            </article>
            <article class="Articulo">
                <?php
/*++++++++++++++++++++++++++++++++++++++++++   Trabajo sobre  datos.txt  +++++++++++++++++++++++++++++++++++++++*/

                    $archivo = fopen($carpeta."/".$nombre_archivo, 'a');   //----> con fopen abro mi archivo de texto, en este caso para solo escrivirlo (de ahi el modo elejido). Si el archivo no existe el modo indicado intentara crearlo.
                    $arregloFinal = [$_POST['nombre'], $resultado];  //------>  Creo un nuevo arreglo que contenga el nombre del jugador y su puntuacion para luego pasarlos de argumentos a Implode()
                    $linea = implode(';',$arregloFinal);  //---->  con implode transformo en una sola linea los elementos de mi $arregloFinal
                    fputs($archivo,$linea.PHP_EOL);   //----->  Con fputs agrego filas a mi arreglo... PHP_EOL agrega una marca final de linea 
                    fclose($archivo);  //---> Cierro mi archivo.
            
            
                    $archivo = fopen($carpeta."/".$nombre_archivo, 'r');
                    $alto = 0;
                    $linea_separada=[''];
                    while (!feof($archivo)) {  //---> Mientras no sea el final de mi archivo realizo...
                        $linea2 = fgets($archivo);   //---> Con fgets leo las lineas de un archivo hasta llegar a unMarca final, en este caso a esa linea la almaceno en una variable.
                        if ($linea2 != '') {  //---> Si la linea anteriormente leida contiene algo, entonces...
                        $linea_separada = explode(';', $linea2);  //---> Con explode la convierto a arreglo y verificlos puntajes:
                            if ($linea_separada[1] <= 9.5) {
                                if ($linea_separada[1] > $alto ) {
                                    $alto = $linea_separada[1];
                                    $ganador = $linea_separada[0];
                                }    
                            } else {  //---> Este else era nesesario ya que en caso de que si la primera varajada dcartas era mayor que 9.5 no definia un puntaje mayor.
                                $mostrar = '<p>Se paso del puntaje ganador</p>';  
                            }
                                 
                        }  
                    }



                    
                    if ($alto == 0) {
                        echo $mostrar;
                    } else {
                        ?>
                            <h2 class="titulo2">Mejor Puntaje</h2>
                            
                            <p>Jugador: <?php echo  $ganador ?></p>
                            <p>Puntaje: <?php echo $alto ?></p>
                        <?php
                    }
                    fclose($archivo);

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/  
                ?>
            
        </article>
    </main>

    <?php
        

} else {
    echo '<article>';
    echo '<p> No se cargó el nombre de usuario.</p>';
    echo '</article> </main>';
    header ('refresh:5; url=../index.php');
}

    require_once('../html/pie.html');
?>




    


    