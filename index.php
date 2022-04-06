<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <link rel="shortcut icon" href="./img/logo4.png" type="image/x-icon">
    <title>HTML BURGERS</title>
</head>
<body>

    <?php
        if (file_exists('xml/menu.xml')) {
            $menu = simplexml_load_file('xml/menu.xml');

        } else {
            exit('Ha ocurrido un error.');
            die();
        }

        function showCaracteristicas($plato) {
            echo "<span class='iconos-container'>";     
            foreach($plato->caracteristicas->caracteristica as $caracteristica) {
                if ($caracteristica == 'Marino') {
                    echo "<i class='icono fa-solid fa-fish' title='Marino'></i>";
                } else if ($caracteristica == 'Vegetal') {
                    echo "<i class='icono fa-solid fa-leaf' title='Vegetal'></i>";
                } else if ($caracteristica == 'Carne') {
                    echo "<i class='icono fa-solid fa-drumstick-bite' title='Carne'></i>";
                } else if ($caracteristica == 'Picante') {
                    echo "<i class='icono fa-solid fa-pepper-hot' title='Picante'></i>";
                } else if ($caracteristica == 'Lacteo') {
                    echo "<i class='icono fa-solid fa-cheese' title='Lacteo'></i>";
                }
            }
            echo "</span>";
       }
    ?>


    <div id="menu" class="row">
        <div id="triptico1" class="column-3 triptico">
            <img src="./img/logo4.png" />
            <div class="iconos-desc">
                <div class="iconos-flex">
                    <div class="icono-item">
                        <i class='icono fa-solid fa-fish' title='Marino'></i>
                        <label><strong>Marino</strong></label>
                    </div>
                    <div class="icono-item">
                        <i class='icono fa-solid fa-leaf' title='Vegetal'></i>
                        <label><strong>Vegetal</strong></label>
                    </div>
                    <div class="icono-item">
                        <i class='icono fa-solid fa-drumstick-bite' title='Carne'></i>
                        <label><strong>Carne</strong></label>
                    </div>
                </div>
                <div class="iconos-flex">
                    <div class="icono-item">
                        <i class='icono fa-solid fa-pepper-hot' title='Picante'></i>
                        <label><strong>Picante</strong></label>
                    </div class="icono-item">
                    <div class="icono-item">
                        <i class='icono fa-solid fa-cheese' title='Lacteo'></i>
                        <label><strong>Lacteo</strong></label>
                    </div>
                </div>
            </div>
            <h3>ENTRANTES</h3>
            <?php
                foreach($menu as $plato) {
                    if ($plato['tipo'] == 'entrante') {
                        echo "<div class='plato'>";
                        echo "<h4>";
                        echo "<span>$plato->nombre</span>";
                        showCaracteristicas($plato);
                        echo "<span>$plato->precio €</span>";
                        echo "</h4>";
                        echo "<p>$plato->descripcion <span>($plato->calorias)</span></p>";
                        echo "</div>";
                    }
                }
            ?>
        </div>

        <div id="triptico2" class="column-3 triptico"> 
            <h3>HAMBURGESAS</h3>
            <?php
                $counter = 0;
                $hamburgesas = [];
                foreach($menu as $plato) {
                    if ($plato['tipo'] == 'hamburgesa' && $counter < 7) {
                        echo "<div class='plato'>";
                        echo "<h4>";
                        echo "<span>$plato->nombre</span>";
                        showCaracteristicas($plato);
                        echo "<span>$plato->precio €</span>";
                        echo "</h4>";
                        echo "<p>$plato->descripcion <span>($plato->calorias)</span></p>";
                        echo "</div>";
                        $counter++;
                        array_push($hamburgesas, (string)$plato->nombre);
                    }
                }
            ?>
        </div>

        <div id="triptico3" class="column-3 triptico">
            <?php
                $counter = 0;
                foreach($menu as $plato) {
                    if (!in_array((string)$plato->nombre, $hamburgesas) && $plato['tipo'] == 'hamburgesa' && $counter < 7) {
                        echo "<div class='plato'>";
                        echo "<h4>";
                        echo "<span>$plato->nombre</span>";
                        showCaracteristicas($plato);
                        echo "<span>$plato->precio €</span>";
                        echo "</h4>";
                        echo "<p>$plato->descripcion <span>($plato->calorias)</span></p>";
                        echo "</div>";
                        $counter++;
                        array_push($hamburgesas, (string)$plato->nombre);
                    }
                }
            ?>
            <h3>POSTRES</h3>
            <?php
                foreach($menu as $plato) {
                    if ($plato['tipo'] == 'postre') {
                        echo "<div class='plato'>";
                        echo "<h4>";
                        echo "<span>$plato->nombre</span>";
                        showCaracteristicas($plato);
                        echo "<span>$plato->precio €</span>";
                        echo "</h4>";
                        echo "<p>$plato->descripcion <span>($plato->calorias)</span></p>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
    

</body>
</html>