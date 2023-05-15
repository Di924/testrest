<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <script src="users.js"></script>
    <script src="tabs.js"></script>
    <div class="wrapper">
        <main class="main">
            <div class="main__container container">
            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'users')">Персонал</button>
                <button class="tablinks" onclick="openTable(event, 'shift')">Смены</button>
                <button class="tablinks" onclick="openTable(event, 'order')">Заказы</button>
                <button class="tablinks" onclick="openTable(event, 'menu')">Меню</button>
            </div>
            <!-- Пользователи -->
            <div id="users" class="tabcontent">
                <?php
                    @ $db = new mysqli('localhost','root','','restaurant');
                    if(mysqli_connect_errno()){
                        echo 'Ошибка: Не удалось установить соединение с базой данных. Пожалуйста, повторите попытку позже.';
                        exit;
                    }
                    mysqli_set_charset($db,'utf8');
                    $query = "SELECT * FROM `users` ORDER BY id ASC";
                    $result = $db->query($query);
                    $num_results = $result->num_rows;
                    echo '<p>'.'Количество персонала: '.$num_results.'</p>';
                ?>
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            <th>Логин</th>
                            <th>Пароль</th>
                            <th>Фотография</th>
                            <th>Должность</th>
                            <th colspan="2"><button onclick="AddTR();">Добавить</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                header("Location: edit.php?id=$id");
                            }
                            for ($i = 0;$i < $num_results; $i++){
                                $row = $result->fetch_assoc();
                                $as = $row['id'];
                                $id = $row['id'];
                                echo '<tr><form action="" method="POST"><td>'.stripslashes($row['id']).'</td>';

                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['lname']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['fname']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['mname']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['login']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="password" name="" placeholder=" " id=""><label>' . stripslashes($row['password']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['photoFile']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['roleId']) .'</label></div></td>';

                                echo '<td><button type="submit">Ред.</button></td>';
                                echo '<td><button type="submit">Уд.</button></td></form></tr>';
                            }
                            $result->free();
                            $db->close()
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="shift" class="tabcontent">
                <?php
                    @ $db = new mysqli('localhost','root','','restaurant');
                    if(mysqli_connect_errno()){
                        echo 'Ошибка: Не удалось установить соединение с базой данных. Пожалуйста, повторите попытку позже.';
                        exit;
                    }
                    mysqli_set_charset($db,'utf8');
                    $query = "SELECT * FROM `shift` ORDER BY id ASC";
                    $result = $db->query($query);
                    $num_results = $result->num_rows;
                    echo '<p>'.'Отображается количество строк: '.$num_results.'</p>';
                ?>
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Начало смены</th>
                            <th>Конец смены</th>
                            <th>Создание смены</th>
                            <th colspan="2"><button onclick="AddTR();">Добавить</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                header("Location: edit.php?id=$id");
                            }
                            for ($i = 0;$i < $num_results; $i++){
                                $row = $result->fetch_assoc();
                                $as = $row['id'];
                                $id = $row['id'];
                                echo '<tr><form action="" method="POST"><td>'.stripslashes($row['id']).'</td>';

                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['dataStart']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['dataEnd']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['dataCreate']) .'</label></div></td>';

                                echo '<td><button type="submit">Ред.</button></td>';
                                echo '<td><button type="submit">Уд.</button></td></form></tr>';
                            }
                            $result->free();
                            $db->close()
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="order" class="tabcontent">
                <?php
                    @ $db = new mysqli('localhost','root','','restaurant');
                    if(mysqli_connect_errno()){
                        echo 'Ошибка: Не удалось установить соединение с базой данных. Пожалуйста, повторите попытку позже.';
                        exit;
                    }
                    mysqli_set_charset($db,'utf8');
                    $query = "SELECT * FROM `orders` ORDER BY id ASC";
                    $result = $db->query($query);
                    $num_results = $result->num_rows;
                    echo '<p>'.'Отображается количество строк: '.$num_results.'</p>';
                ?>
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Стол</th>
                            <th>Время</th>
                            <th>Смена</th>
                            <th>Официант</th>
                            <th colspan="2"><button onclick="AddTR();">Добавить</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                header("Location: edit.php?id=$id");
                            }
                            for ($i = 0;$i < $num_results; $i++){
                                $row = $result->fetch_assoc();
                                $as = $row['id'];
                                $id = $row['id'];
                                echo '<tr><form action="" method="POST"><td>'.stripslashes($row['id']).'</td>';

                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['table']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['time']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['shiftId']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['userId']) .'</label></div></td>';

                                echo '<td><button type="submit">Ред.</button></td>';
                                echo '<td><button type="submit">Уд.</button></td></form></tr>';
                            }
                            $result->free();
                            $db->close()
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="menu" class="tabcontent">
                <?php
                    @ $db = new mysqli('localhost','root','','restaurant');
                    if(mysqli_connect_errno()){
                        echo 'Ошибка: Не удалось установить соединение с базой данных. Пожалуйста, повторите попытку позже.';
                        exit;
                    }
                    mysqli_set_charset($db,'utf8');
                    $query = "SELECT * FROM `orders` ORDER BY id ASC";
                    $result = $db->query($query);
                    $num_results = $result->num_rows;
                    echo '<p>'.'Отображается количество строк: '.$num_results.'</p>';
                ?>
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Стол</th>
                            <th>Время</th>
                            <th>Смена</th>
                            <th>Официант</th>
                            <th colspan="2"><button onclick="AddTR();">Добавить</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                header("Location: edit.php?id=$id");
                            }
                            for ($i = 0;$i < $num_results; $i++){
                                $row = $result->fetch_assoc();
                                $as = $row['id'];
                                $id = $row['id'];
                                echo '<tr><form action="" method="POST"><td>'.stripslashes($row['id']).'</td>';

                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['table']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['time']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['shiftId']) .'</label></div></td>';
                                echo '<td><div class="input-box"><input type="text" name="" placeholder=" " id=""><label>' . stripslashes($row['userId']) .'</label></div></td>';

                                echo '<td><button type="submit">Ред.</button></td>';
                                echo '<td><button type="submit">Уд.</button></td></form></tr>';
                            }
                            $result->free();
                            $db->close()
                        ?>
                    </tbody>
                </table>
            </div>

            
        </main>
    </div>
</body>
</html>