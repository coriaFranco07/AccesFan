<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #212964   ; /* Color de fondo oscuro */
            font-family: "Roboto", sans-serif;
        }

        .container {
            margin: auto;
            border-radius: 15px;
            padding: 20px;
            background-color: #f0f0f0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            border-radius: 15px;
            padding: 10px;
            background-color: #f0f0f0;
            color: #333333; /* Color de texto oscuro */
        }

        .btn-cancelar {
            position: fixed;
            right: 20px;
            top: 20px;
            background-color: #1f2735;
            color: #fff;
            margin-right: 170px;
        }

        table {
            margin-top: 30px;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>EVENTOS</h1>
        <a href="principal.php" class="btn btn-cancelar" style="right: 140px; width: 200px; position: fixed;">Cancelar</a>
        <br><br><br><br>
        <p><strong>COPAS LOCALES:</strong> 5 </p>
        <p><strong>COPAS INTERNACIONALES:</strong> 3 </p>
        <button onclick="importeDinero()" class="btn btn-outline-info;" style="background-color: #1F7D71 ;" >COLABORACION DE FONDOS</button>
        <br><br>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">EQUIPO</th>
                    <th scope="col">Pts</th>
                    <th scope="col">Pj</th>
                    <th scope="col">Pg</th>
                    <th scope="col">Pe</th>
                    <th scope="col">Pp</th>
                    <th scope="col">Gf</th>
                    <th scope="col">Gc</th>
                    <th scope="col">Dif</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="left">River Plate</td>
                    <td>34</td>
                    <td>14</td>
                    <td>11</td>
                    <td>1</td>
                    <td>2</td>
                    <td>25</td>
                    <td>6</td>
                    <td>+19</td>
                </tr>
                <tr>
                    <td align="left">San Lorenzo</td>
                    <td>28</td>
                    <td>14</td>
                    <td>8</td>
                    <td>4</td>
                    <td>2</td>
                    <td>15</td>
                    <td>5</td>
                    <td>+10</td>
                </tr>
                <tr>
                    <td align="left">Def y Justicia</td>
                    <td>27</td>
                    <td>14</td>
                    <td>8</td>
                    <td>3</td>
                    <td>3</td>
                    <td>20</td>
                    <td>8</td>
                    <td>+12</td>
                </tr>
                <tr>
                    <td align="left">Talleres (C)</td>
                    <td>24</td>
                    <td>14</td>
                    <td>7</td>
                    <td>3</td>
                    <td>4</td>
                    <td>23</td>
                    <td>12</td>
                    <td>+11</td>
                </tr>
                <tr>
                    <td align="left">Estudiantes (LP)</td>
                    <td>24</td>
                    <td>14</td>
                    <td>7</td>
                    <td>3</td>
                    <td>4</td>
                    <td>16</td>
                    <td>13</td>
                    <td>+3</td>
                </tr>
                <tr>
                    <td align="left">Belgrano</td>
                    <td>24</td>
                    <td>14</td>
                    <td>7</td>
                    <td>3</td>
                    <td>4</td>
                    <td>13</td>
                    <td>11</td>
                    <td>+2</td>
                </tr>
                <tr>
                    <td align="left">Rosario Central</td>
                    <td>23</td>
                    <td>14</td>
                    <td>6</td>
                    <td>5</td>
                    <td>3</td>
                    <td>19</td>
                    <td>19</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td align="left">Lanus</td>
                    <td>22</td>
                    <td>13</td>
                    <td>6</td>
                    <td>4</td>
                    <td>3</td>
                    <td>21</td>
                    <td>14</td>
                    <td>+7</td>
                </tr>
                <tr>
                    <td align="left">Godoy Cruz</td>
                    <td>21</td>
                    <td>14</td>
                    <td>6</td>
                    <td>3</td>
                    <td>5</td>
                    <td>18</td>
                    <td>18</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function importeDinero() {
            window.location.href = "importeDinero.php";
        }
    </script>
</body>
</html>
