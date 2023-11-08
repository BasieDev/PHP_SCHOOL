<form action="rente.php" method="post">
     Saldo: <input type="text" name="saldo" value="" required><br><br>
     Rente: <input type="text" name="rente" value="" required><br><br>
     <input type="radio" name="calculationtype" value="jaren"> Komende 10 jaar berekenen<br>
     <input type="radio" name="calculationtype" value="verdubbel"> Jaren tot verdubbeling berekenen<br><br>
     <input type="submit" name="submit" value="Verstuur">
</form>

<?php
    if($_POST) {
        $saldo = $_POST['saldo'];
        $rente = $_POST['rente'];
        $selection = $_POST['calculationtype'];
        echo $selection;

        if($selection == 'jaren') {
            $new_saldo = 0;
            echo "<table border='1'>";
            for($i = 1; $i <= 10; $i++) {
                if($new_saldo == 0) {
                    $honderste_saldo = $saldo/100;
                    $teruggave = $honderste_saldo*$rente;
                    $new_saldo = $saldo+$teruggave;
                    echo "<tr><td>{$saldo}</td><td>{$rente}%</td><td>".round($new_saldo, 2)."</td></tr>";
                    $vorig_jaar_saldo = $new_saldo;
                } else{
                    $honderste_saldo = $new_saldo/100;
                    $teruggave = $honderste_saldo*$rente;
                    $new_saldo = $new_saldo+$teruggave;
                    echo "<tr><td>".round($vorig_jaar_saldo, 2)."</td><td>{$rente}%</td><td>".round($new_saldo, 2)."</td></tr>";
                    $vorig_jaar_saldo = $new_saldo;
                }
            }
            echo "</table>";
        }
        
        if($selection == 'verdubbel') {
            echo "<table border='1'>";
            $new_saldo = 0;
            $goal = $saldo*2;
            while($saldo < $goal) {
                $honderste_saldo = $saldo/100;
                echo "<tr><td>{$saldo}</td><td>{$rente}%</td>";
                $teruggave = $honderste_saldo*$rente;
                $saldo = $saldo+$teruggave;
                echo "<td>{$saldo}</td></tr>";
            }
            echo "</table>";
        }
    }
?>