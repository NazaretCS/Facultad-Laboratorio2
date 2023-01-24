
<?php
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina

   $palabra='somos';
   $palabraAlRevez='';
   $largoPalabra = strlen($palabra)-1; //mediante la funcion de strlen obtengo la cantidad de caracteres que tiene mi palabra, para utilizarlo como indice mas adelante.

    //En la linea 7 me surgio la duda de porque si solo pongo "strlen($palabra)" mi codigo da error, pero si disminuyo en uno la cantidad si funciona perfectamente... le agradeceria si puede esclarecerme esa duda.

   for ($i=0; $largoPalabra >= 0;  $i++, $largoPalabra--) { 
       $palabraAlRevez[$i] = $palabra[$largoPalabra];
   }
   // La estructura For anterior lo que hace es siempre que $largoPalabra es mayor o igual a 0, entonces incremente mi variable $i en 1, y decrementa $largoPalabra en 1; ademas uso ambos para ir colocando en $palabraAlRevez lo guardado en palabra pero alterando el lugar (si en uno el elemento en cuestion es el primero, en el otro sera el ultimo, y asi sucesibamente)
?>

<main>
   <h2>Palabra </h2>
        <article>
            <p>Palabra: <strong> <?php echo $palabra ?></strong> </p>

            <p><?php if ($palabra === $palabraAlRevez) { 
                echo  '<strong>Es un Polindromo</strong>';
            } else {
                echo '<strong>No es un polindromo </strong>';
            }?>
            </p>
        </article>
   


</main>

<?php
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?> 






<!-- ------------------------------2do Codigo------------------------------------------------------------- -->

<?php
    /*
    <?php
    require('html/encavezado.html');
    $palabra='somos';
    $palabraInvertida=strrev($palabra); //la funcion strrev nos permite generar la version iinvertida de la cadena que esta entre parentesis.
    ?> 

    <main>
       <section>
         <article>
             <h2>Palabras Polindromos</h2>
             <?php
             
                if (strcmp($palabra, $palabraInvertida)==0){ //la funcion strcmp me realiza la comparacion entre los argumentos que estan entre parentesis. Como resultado me devuelve un valor numerico
                    echo '<p> La cadena <strong>' .$palabra. '</strong> es un polindromo</p>';
                } else {
                    echo '<p> Lacadena <strong>' .$palabra. '</strong> No es un polindromo</p>';
                }
                ;
             ?>
             <!--Nose si darle esta resolucion uviera sido lo que ustedes preferian (teniendo en cuenta el tema de la semana) pero verdaderamente no se venia a la mente otra manera de resolverlo.-->
         </article>
       </section>
    </main> 

    <?php
    require('html/pie.html');
    ?> 

    */
?> 
<!-- Tambien me surgio la duda de si seria aceptable esta resolucion del problema, devido a que uso una funcion que no se nos fue enseñada por ustedes y tambien no tiene nada que ver con el tema de la semana...    lo cual me despierta la duda de si podremos usar funciones en algunos casos que no nos alla enseñado la catedra, pero que si este relacionada con el problema. -->

<!-- ----------------------------------Fin del 2do Código------------------------------------------------- -->



