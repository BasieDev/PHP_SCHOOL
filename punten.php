<body>
    <h1>Behaalde Punten:</h1>
    <form action="punten.php" method="post">
        <table>
        <tr>
            <td><input type="text" name='name0' value="<?php echo isset($_POST['name0']) ? $_POST['name0'] : '' ?>" required></td>
            <td><input type="number" name='score0' value="<?php echo isset($_POST['score0']) ? $_POST['score0'] : '' ?>" required></td>
        </tr>
        <tr>
            <td><input type="text" name='name1' value="<?php echo isset($_POST['name1']) ? $_POST['name1'] : '' ?>" required></td>
            <td><input type="number" name='score1' value="<?php echo isset($_POST['score1']) ? $_POST['score1'] : '' ?>" required></td>
        </tr>  
        <tr>
            <td><input type="text" name='name2' value="<?php echo isset($_POST['name2']) ? $_POST['name2'] : '' ?>" required></td>
            <td><input type="number" name='score2' value="<?php echo isset($_POST['score2']) ? $_POST['score2'] : '' ?>" required></td>
        </tr>  
        <tr>
            <td><input type="text" name='name3' value="<?php echo isset($_POST['name3']) ? $_POST['name3'] : '' ?>" required></td>
            <td><input type="number" name='score3' value="<?php echo isset($_POST['score3']) ? $_POST['score3'] : '' ?>" required></td>
        </tr>    
        </table>
        <br>
        <input type='submit'>
    </form>
</body>

<h1>Uitslag:</h1>

<?php
    if($_POST) {
        $names = array();
        $names[0] = $_POST['name0'];
        $names[1] = $_POST['name1'];
        $names[2] = $_POST['name2'];
        $names[3] = $_POST['name3'];

        $scores = array();
        $scores[0] = $_POST['score0'];
        $scores[1] = $_POST['score1'];
        $scores[2] = $_POST['score2'];
        $scores[3] = $_POST['score3'];

        $highestscore = 0;
        $iteration = 0;

        foreach($scores as $score) {
            $iteration++;
            if($score > $highestscore) {
                $highestscore = $score;
                $highestscoreiteration = $iteration;
            }
        }

        $winner = $names[$highestscoreiteration];
        echo $winner.' met '.$highestscore.' punten!';
    }
?>