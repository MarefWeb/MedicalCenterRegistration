<?php
    require_once 'includes/db.php';
    require_once 'includes/functions.php';

    session_start();

    if(!is_account_exists($_SESSION['login'], $_SESSION['password'], $db)) header('Location: /admin');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Адмін панель</title>
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png" />
        <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png" />
        <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <header class="header">
            <a href="includes/logout.php" class="leave">Вийти з облікового запису</a>
            <p class="title"><span>Адмін</span> панель</p>
            <a href="/" class="leave">Повернутися на сайт</a>
        </header>
        <main class="main">
            <div class="table-wrapper">
                <table class="table">
                <tr>
                    <td class="title <?php if($_GET['filter'] == 'id' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=id&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            #
                        </a>
                    </td>
                    <td class="title <?php if($_GET['filter'] == 'name' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=name&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            Ім'я
                        </a>
                    </td>
                    <td class="title <?php if($_GET['filter'] == 'surname' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=surname&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            Прізвище
                        </a>
                    </td>
                    <td class="title <?php if($_GET['filter'] == 'third_name' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=third_name&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            По-батькові
                        </a>
                    </td>
                    <td class="title <?php if($_GET['filter'] == 'gender' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=gender&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            Стать
                        </a>
                    </td>
                    <td class="title <?php if($_GET['filter'] == 'born' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=born&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            Дата народження
                        </a>
                    </td>
                    <td class="title <?php if($_GET['filter'] == 'phone' && $_GET['sort']) echo $_GET['sort'] ?>">
                        <a href="<?php echo '/admin/content.php?filter=phone&sort=' . ($_GET['sort'] == 'asc' ? 'desc' : 'asc'); ?>">
                            Номер телефону
                        </a>
                    </td>
                    <td></td>
                </tr>
                <?php
                    if($_GET['filter'] && $_GET['sort'])
                        $patients_query = mysqli_query($db, "SELECT * from patients ORDER BY `".$_GET['filter']."`".$_GET['sort']);
                    else
                        $patients_query = mysqli_query($db, "SELECT * from patients");

                    $patients_data = get_assoc_rows($patients_query);

                    for($i = 0; $i < count($patients_data); $i++) {
                        $curr_patient = $patients_data[$i];

                        echo '
                            <tr>
                                <td class="id">'.$curr_patient['id'].'</td>
                                <td class="name">'.$curr_patient['name'].'</td>
                                <td class="surname">'.$curr_patient['surname'].'</td>
                                <td class="thirdName">'.$curr_patient['third_name'].'</td>
                                <td class="gender">'.$curr_patient['gender'].'</td>
                                <td class="born">'.$curr_patient['born'].'</td>
                                <td class="phone">'.$curr_patient['phone'].'</td>
                                <td class="btns">
                                    <button class="btn editBtn" data-target="form">Редагувати</button>
                                    <a href="includes/remove_patient.php?id='.$curr_patient['id'].'" class="btn">Видалити</a>
                                </td>
                            </tr>
                        ';
                    }
                ?>
                </table>
            </div>
            <form action="includes/edit_patient_data.php" method="POST" class="form" id="form">
                <p class="title">Редагування</p>
                <input type="hidden" name="id" id="id">
                <input type="text" name="surname" placeholder="Прізвище" class="form__field" id="surname" />
                <input type="text" name="name" placeholder="Ім'я" class="form__field" id="name" />
                <input type="text" name="third-name" placeholder="По-батькові" class="form__field" id="thirdName" />
                <select name="gender" class="form__field form__select" id="gender">
                    <option value="Ваша стать" selected disabled>Ваша стать</option>
                    <option value="Чоловік">Чоловік</option>
                    <option value="Жінка">Жінка</option>
                </select>
                <input
                    type="text"
                    name="born"
                    placeholder="Дата народження (дд.мм.рррр)"
                    class="form__field"
                    id="dateField"
                />
                <input type="text" name="phone" placeholder="Номер телефону" class="form__field" id="phoneField" />
                <button class="form__btn">Підтвердити</button>
            </form>
        </main>

        <script src="js/libs.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
