
<?php
    require('html/encavezado.html'); //introdusco la parte del encabezado de mi paguina
//la variable numero tendra un numero aleatore entre 65 y 67 presisamente para que despues meiandite la funcion chr() pueda transformar ese valor a una letra (A, B o C ya que asi lo requiero).
    $numero=mt_rand(65,67);
    $numero= chr($numero);
   
?> 
    <section>
        <aside>
            <p><strong> <?php echo 'Nivel ' .$numero. '</strong>' ?> </p>
<?php   
    switch ($numero){
        case $numero=='A':
            echo '<ul>
                    <li>Listado de Productos</li>
                    <li>Informes</li>
                    
                  </ul>';
            break;
        case $numero=='B':
            echo '<ul>
                     <li>CRUD productos</li>
                     <li>CRUD categorias</li>
                     <li>Informes</li>
                  </ul>';
            break;
        case $numero=='C':
            echo '<ul>
                    <li> CRUD productos </li>
                    <li>CRUD categorías</li>
                    <li>Informes</li>
                    <li>CRUD usuarios</li>
                    <li>Balances</li>
                    </ul>';
            break;
    }
//de acuerdo con el valor que tome la variable numero, mediante este segun, se mostraran distintas opciones de menus.
?>   
            
        </aside>
        <main>
            <article>
                <p>CUERPO DE PAGUINA</p>
            </article>
            
        </main>
        
    
    </section>

<?php
    require('html/pie.html');//introduzco la parte del pie de mi paguina 
?> 