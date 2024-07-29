<?php
        // Calculate the remaining products (available - sold)
        $remainingProducts = $row['available'] - $row['sold'];
        echo $remainingProducts;
        ?>