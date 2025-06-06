<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TETRIS</title>
</head>
<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        background: black;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 20px;
    }

    canvas {
        border: 1px solid white;
    }

    #score {
        color: white;
        font-size: 20px;
        margin-left: 20px; /* Adjust this value as needed */
    }

    #goal {
        color: white;
        font-size: 20px;
        margin-left: 20px;
    }

    h3 {
        color: white;
    }

    h1 {
        color: green;
    }

    p {
        color: white;
    }

    #elems {
        display: flex;
        flex-direction: column;
    }

    #winmsg {
        display: none;
    }

    #losemsg {
        display: none;
    }
</style>

<body>

<div id="elems">
    <h3 id="winmsg">Félicitations, vous avez perdu votre temps !</h3>

    <canvas width="320" height="640" id="game"></canvas>
    <div id="infos">
        <div id="score">Score: 0</div>
        <div id="goal">Score à atteindre: 404</div>
    </div>

    <div id="losemsg">
        <h1>GAME OVER</h1>
        <p id="scorefinal"></p>
        <button id="boutonPartager">Partager</button>
    </div>
</div>

<script>
    // get a random integer between the range of [min,max]
    // @see https://stackoverflow.com/a/1527820/2124254
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);

        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // generate a new tetromino sequence
    function generateSequence() {
        const sequence = ['I', 'J', 'L', 'O', 'S', 'T', 'Z'];

        while (sequence.length) {
            const rand = getRandomInt(0, sequence.length - 1);
            const name = sequence.splice(rand, 1)[0];
            tetrominoSequence.push(name);
        }
    }

    function updateScoreDisplay() {
        const scoreElement = document.getElementById('score');
        scoreElement.textContent = 'Score: ' + var_score;
    }

    // get the next tetromino in the sequence
    function getNextTetromino() {
        if (tetrominoSequence.length === 0) {
            generateSequence();
        }

        const name = tetrominoSequence.pop();
        const matrix = tetrominos[name];

        // I and O start centered, all others start in left-middle
        const col = playfield[0].length / 2 - Math.ceil(matrix[0].length / 2);

        // I starts on row 21 (-1), all others start on row 22 (-2)
        const row = name === 'I' ? -1 : -2;

        return {
            name: name,      // name of the piece (L, O, etc.)
            matrix: matrix,  // the current rotation matrix
            row: row,        // current row (starts offscreen)
            col: col         // current col
        };
    }

    // rotate an NxN matrix 90deg
    // @see https://codereview.stackexchange.com/a/186834
    function rotate(matrix) {
        const N = matrix.length - 1;
        const result = matrix.map((row, i) =>
            row.map((val, j) => matrix[N - j][i])
        );

        return result;
    }

    // check to see if the new matrix/row/col is valid
    function isValidMove(matrix, cellRow, cellCol) {
        for (let row = 0; row < matrix.length; row++) {
            for (let col = 0; col < matrix[row].length; col++) {
                if (matrix[row][col] && (
                    // outside the game bounds
                    cellCol + col < 0 ||
                    cellCol + col >= playfield[0].length ||
                    cellRow + row >= playfield.length ||
                    // collides with another piece
                    playfield[cellRow + row][cellCol + col])
                ) {
                    return false;
                }
            }
        }

        return true;
    }

    // place the tetromino on the playfield
    function placeTetromino() {
        for (let row = 0; row < tetromino.matrix.length; row++) {
            for (let col = 0; col < tetromino.matrix[row].length; col++) {
                if (tetromino.matrix[row][col]) {
                    // game over if piece has any part offscreen
                    if (tetromino.row + row < 0) {
                        return showGameOver();
                    }

                    playfield[tetromino.row + row][tetromino.col + col] = tetromino.name;
                }
            }
        }

        // check for line clears starting from the bottom and working our way up
        for (let row = playfield.length - 1; row >= 0;) {
            if (playfield[row].every(cell => !!cell)) {

                // drop every row above this one
                for (let r = row; r >= 0; r--) {
                    for (let c = 0; c < playfield[r].length; c++) {
                        playfield[r][c] = playfield[r - 1][c];
                    }
                }
                var_score += 300; // Increment the score for each cleared row
                updateScoreDisplay();
                if (var_score >= 404) {
                    return showWin();
                }
            } else {
                row--;
            }
        }

        tetromino = getNextTetromino();
    }

    // show the win thing
    function showWin() {
        document.getElementById("winmsg").style.display = "inline";
    }

    // show the game over screen
    function showGameOver() {
        cancelAnimationFrame(rAF);
        gameOver = true;
        document.getElementById("losemsg").style.display = "inline";
        document.getElementById("scorefinal").innerHTML = "Score: " + var_score;

        document.getElementById('boutonPartager').addEventListener('click', function () {
            window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent('Mon score est de ' + var_score + ' au jeu en ligne ! #Tetris #Ranked'), '_blank');
        });

    }

    const canvas = document.getElementById('game');
    const context = canvas.getContext('2d');
    const grid = 32;
    const tetrominoSequence = [];
    let var_score = 0;

    // keep track of what is in every cell of the game using a 2d array
    // tetris playfield is 10x20, with a few rows offscreen
    const playfield = [];

    // populate the empty state
    for (let row = -2; row < 20; row++) {
        playfield[row] = [];

        for (let col = 0; col < 10; col++) {
            playfield[row][col] = 0;
        }
    }

    // how to draw each tetromino
    // @see https://tetris.fandom.com/wiki/SRS
    const tetrominos = {
        'I': [
            [0, 0, 0, 0],
            [1, 1, 1, 1],
            [0, 0, 0, 0],
            [0, 0, 0, 0]
        ],
        'J': [
            [1, 0, 0],
            [1, 1, 1],
            [0, 0, 0],
        ],
        'L': [
            [0, 0, 1],
            [1, 1, 1],
            [0, 0, 0],
        ],
        'O': [
            [1, 1],
            [1, 1],
        ],
        'S': [
            [0, 1, 1],
            [1, 1, 0],
            [0, 0, 0],
        ],
        'Z': [
            [1, 1, 0],
            [0, 1, 1],
            [0, 0, 0],
        ],
        'T': [
            [0, 1, 0],
            [1, 1, 1],
            [0, 0, 0],
        ]
    };

    // color of each tetromino
    const colors = {
        'I': 'cyan',
        'O': 'yellow',
        'T': 'purple',
        'S': 'green',
        'Z': 'red',
        'J': 'blue',
        'L': 'orange'
    };

    let count = 0;
    let tetromino = getNextTetromino();
    let rAF = null;  // keep track of the animation frame so we can cancel it
    let gameOver = false;

    // game loop
    function loop() {
        rAF = requestAnimationFrame(loop);
        context.clearRect(0, 0, canvas.width, canvas.height);

        // draw the playfield
        for (let row = 0; row < 20; row++) {
            for (let col = 0; col < 10; col++) {
                if (playfield[row][col]) {
                    const name = playfield[row][col];
                    context.fillStyle = colors[name];

                    // drawing 1 px smaller than the grid creates a grid effect
                    context.fillRect(col * grid, row * grid, grid - 1, grid - 1);
                }
            }
        }

        // draw the active tetromino
        if (tetromino) {

            // tetromino falls every 35 frames
            if (++count > 35) {
                tetromino.row++;
                count = 0;

                // place piece if it runs into anything
                if (!isValidMove(tetromino.matrix, tetromino.row, tetromino.col)) {
                    tetromino.row--;
                    placeTetromino();
                }
            }

            context.fillStyle = colors[tetromino.name];

            for (let row = 0; row < tetromino.matrix.length; row++) {
                for (let col = 0; col < tetromino.matrix[row].length; col++) {
                    if (tetromino.matrix[row][col]) {

                        // drawing 1 px smaller than the grid creates a grid effect
                        context.fillRect((tetromino.col + col) * grid, (tetromino.row + row) * grid, grid - 1, grid - 1);
                    }
                }
            }
        }
    }

    // listen to keyboard events to move the active tetromino
    document.addEventListener('keydown', function (e) {
        if (gameOver) return;

        // left and right arrow keys (move)
        if (e.which === 37 || e.which === 39) {
            const col = e.which === 37
                ? tetromino.col - 1
                : tetromino.col + 1;

            if (isValidMove(tetromino.matrix, tetromino.row, col)) {
                tetromino.col = col;
            }
        }

        // up arrow key (rotate)
        if (e.which === 38) {
            const matrix = rotate(tetromino.matrix);
            if (isValidMove(matrix, tetromino.row, tetromino.col)) {
                tetromino.matrix = matrix;
            }
        }

        // down arrow key (drop)
        if (e.which === 40) {
            const row = tetromino.row + 1;

            if (!isValidMove(tetromino.matrix, row, tetromino.col)) {
                tetromino.row = row - 1;

                placeTetromino();
                return;
            }

            tetromino.row = row;
        }
    });

    // start the game
    rAF = requestAnimationFrame(loop);
</script>

</body>

</html>
