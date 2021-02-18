<?php
    require_once 'includes/db.php';
    require_once 'includes/functions.php';

    session_start();

    if(!is_account_exists($_SESSION['login'], $_SESSION['password'], $db)) header('Location: /admin');

    $doctors_query = mysqli_query($db, "SELECT * FROM doctors"); 
    $doctors_result = get_assoc_rows($doctors_query);
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
            <form action="/admin/content.php" method="GET" class="form active form_sort" id="sort-form">
                <p>Вибірка за лікарем:</p>
                <select name="sort-doctor" class="form__field" id="sort-doctor">
                    <option value="Оберіть лікаря" selected disabled>Оберіть лікаря</option>
                    <?php
                        for($i = 0; $i < count($doctors_result); $i++) {
                            $curr_doctor = $doctors_result[$i];
                            echo '<option value="'.$curr_doctor['id'].'">'.$curr_doctor['third_name'].' '.$curr_doctor['name'].' '.$curr_doctor['surname'].' - '.$curr_doctor['specialization'].'</option>';
                        }
                    ?>
                </select>
                <button class="form__btn">Сортувати</button>
            </form>
            <div class="table-wrapper">
                <table class="table">
                <tr>
                    <?php
                        function is_active_sort($sort_el) {
                            if($_GET['filter'] == $sort_el && $_GET['sort']) echo $_GET['sort'];
                        }

                        function generate_sort_link($sort_el) {
                            $query = $_GET;
                            $query['filter'] = $sort_el;
                            $query['sort'] = ($_GET['filter'] == $sort_el && $_GET['sort'] == 'asc' ? 'desc' : 'asc');
                            $query_result = http_build_query($query);
                            $link = $_SERVER['PHP_SELF'] . '?' . $query_result;
                            echo $link;
                        }
                    ?>
                    <td class="title <?php is_active_sort('id') ?>">
                        <a href="<?php generate_sort_link('id') ?>">
                            #
                        </a>
                    </td>
                    <td class="title <?php is_active_sort('name') ?>">
                        <a href="<?php generate_sort_link('name') ?>">
                            Ім'я
                        </a>
                    </td>
                    <td class="title <?php is_active_sort('surname') ?>">
                        <a href="<?php generate_sort_link('surname') ?>">
                            Прізвище
                        </a>
                    </td>
                    <td class="title <?php is_active_sort('third_name') ?>">
                        <a href="<?php generate_sort_link('third_name') ?>">
                            По-батькові
                        </a>
                    </td>
                    <td class="title <?php is_active_sort('gender') ?>">
                        <a href="<?php generate_sort_link('gender') ?>">
                            Стать
                        </a>
                    </td>
                    <td class="title <?php is_active_sort('born') ?>">
                        <a href="<?php generate_sort_link('born') ?>">
                            Дата народження
                        </a>
                    </td>
                    <td class="title <?php is_active_sort('phone') ?>">
                        <a href="<?php generate_sort_link('phone')  ?>">
                            Номер телефону
                        </a>
                    </td>
                    <td class="title">
                        Лікарь
                    </td>
                    <td></td>
                </tr>
                <?php
                    $query = "SELECT * FROM patients";

                    if($_GET['sort-doctor']) $query .= ' WHERE  `doctor_id` = ' . $_GET['sort-doctor'];
                    if($_GET['filter'] && $_GET['sort']) $query .= ' ORDER BY `'.$_GET['filter'].'`'.$_GET['sort']; 
                    
                    $patients_query = mysqli_query($db, $query);
                    $patients_data = get_assoc_rows($patients_query);

                    for($i = 0; $i < count($patients_data); $i++) {
                        $curr_patient = $patients_data[$i];
                        $curr_patient_doctor_id = $curr_patient['doctor_id'];
                        $curr_patient_doctor_query = mysqli_query($db, "SELECT * FROM doctors WHERE `id` = $curr_patient_doctor_id");
                        $curr_patient_doctor = mysqli_fetch_assoc($curr_patient_doctor_query);
                        $curr_patient_doctor_id = $curr_patient_doctor['id'];
                        $curr_patient_doctor_info = $curr_patient_doctor['third_name'] . ' ' . $curr_patient_doctor['name'] . ' ' . $curr_patient_doctor['surname'] . ' - ' . $curr_patient_doctor['specialization'];

                        echo '
                            <tr>
                                <td class="id">'.$curr_patient['id'].'</td>
                                <td class="name">'.$curr_patient['name'].'</td>
                                <td class="surname">'.$curr_patient['surname'].'</td>
                                <td class="thirdName">'.$curr_patient['third_name'].'</td>
                                <td class="gender">'.$curr_patient['gender'].'</td>
                                <td class="born">'.$curr_patient['born'].'</td>
                                <td class="phone">'.$curr_patient['phone'].'</td>
                                <td class="doctor" data-id="'.$curr_patient_doctor_id.'">'.$curr_patient_doctor_info.'</td>
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
            <form action="includes/add_doctor.php" method="POST" class="form form_doctor" id="doctor-form">
                <p class="title">Додати нового лікаря</p>
                <p id="error">Перевірте правильність заповнення полів</p>
                <input type="text" name="surname" placeholder="Прізвище" class="form__field" id="doctor-surname" />
                <input type="text" name="name" placeholder="Ім'я" class="form__field" id="doctor-name" />
                <input type="text" name="third-name" placeholder="По-батькові" class="form__field" id="doctor-thirdName" />
                <select name="gender" class="form__field form__select" id="doctor-gender">
                    <option value="Стать" selected disabled>Стать</option>
                    <option value="Чоловік">Чоловік</option>
                    <option value="Жінка">Жінка</option>
                </select>
                <input type="text" name="specialization" placeholder="Спеціалізація" class="form__field" id="doctor-specialization" />
                <button class="form__btn">Додати</button>
            </form>
            <form action="includes/edit_patient_data.php" method="POST" class="form" id="form">
                <p class="title">Редагування</p>
                <p id="error">Перевірте правильність заповнення полів</p>
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
                <select name="doctor" class="form__field form__select" id="doctor">
                    <option value="Оберіть лікаря" selected disabled>Оберіть лікаря</option>
                    <?php
                        for($i = 0; $i < count($doctors_result); $i++) {
                            $curr_doctor = $doctors_result[$i];
                            echo '<option value="'.$curr_doctor['id'].'">'.$curr_doctor['third_name'].' '.$curr_doctor['name'].' '.$curr_doctor['surname'].' - '.$curr_doctor['specialization'].'</option>';
                        }
                    ?>
                </select>
                <button class="form__btn">Підтвердити</button>
            </form>
        </main>

        <script src="js/libs.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
