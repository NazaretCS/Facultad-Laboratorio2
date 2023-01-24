<?php
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina
    require_once('php/funcion.php'); //requiero mi archivo funcion.php ya que el mismo alverga a mi procedimiento mostrar

/*+++++++++++++++++++++++++++++++++++++++++++++  Genero mis arreglos +++++++++++++++++++++++++++++++++++++++++*/   
    $carta = array('1' => 1 , '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10, '11' => 11, '12' => 12, '13' => 12);
    //print_r($carta);

    $palo = array('1' =>'corazon', '2' =>'trebol', '3' =>'pica', '4' =>'diamante');
    //print_r($palo);
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


?>
    <main>
        <article>
            <?php
                mostrar($carta,$palo);  //como mi procedimiento se encarga de todo simplemente muestro sus resultados
            ?>
        </article>
    </main>
    
<?php
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?>



