<?php
    require_once 'admin/includes/db.php';
    require_once 'admin/includes/functions.php';

    $doctors_query = mysqli_query($db, "SELECT * FROM doctors"); 
    $doctors_result = get_assoc_rows($doctors_query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Елвейс</title>
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
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <section class="adress-line">
            <div class="container">
                <div class="adress-line__inner">
                    <svg
                        class="mr-2"
                        xmlns="//www.w3.org/2000/svg"
                        xmlns:xlink="//www.w3.org/1999/xlink"
                        aria-hidden="true"
                        focusable="false"
                        width="0.75em"
                        height="1em"
                        preserveAspectRatio="xMidYMid meet"
                        viewBox="0 0 768 1024"
                    >
                        <path
                            d="M388 0q-78 0-149.5 31.5t-123.5 84T31.5 240 0 390q0 44 12 92t28 89 46 91 53.5 84.5 63.5 84 62 75.5 62 72q12 14 18 20 2 3 7 7.5t18 11.5 25 7h3q28 0 50-26 320-368 320-608 0-167-102-277Q560 0 388 0zm12 955q-1 2-4 4l-4-4-17-19q-38-44-59-68.5T257 796t-60-79.5-51-79-44.5-84-26.5-81T64 390q0-87 44-162.5T226.5 108 388 64q79 0 141 27.5t99.5 74.5T685 270t19 120q0 216-304 565zm-15-762q-31 0-60.5 10t-53 27.5T230 272t-27.5 53-9.5 60q0 80 56.5 136t136 56T521 521t56-136q0-39-15-74.5t-41-61-61.5-41T385 193zm0 320q-53 0-91-38t-38-91 37.5-90.5T384 256t90.5 37.5T512 384q0 66-53 105-33 24-74 24z"
                            fill="#00BBF9"
                        ></path>
                    </svg>
                    <p>Україна, м. Суми, вул. Прокоф'єва, 23</p>
                </div>
            </div>
        </section>
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="logo">
                        <img src="img/logo.svg" alt="logo" />
                        <p>Елвейс</p>
                    </div>
                    <div class="info-block support">
                        <svg
                            class="h-40 pr-2 pr-xl-3"
                            version="1.1"
                            id="Capa_1"
                            xmlns="//www.w3.org/2000/svg"
                            xmlns:xlink="//www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            viewBox="0 0 512.076 512.076"
                            style="enable-background: new 0 0 512.076 512.076"
                            xml:space="preserve"
                        >
                            <g transform="translate(-1 -1)">
                                <path
                                    fill="#00BBF9"
                                    d="M499.639,396.039l-103.646-69.12c-13.153-8.701-30.784-5.838-40.508,6.579l-30.191,38.818
                        c-3.88,5.116-10.933,6.6-16.546,3.482l-5.743-3.166c-19.038-10.377-42.726-23.296-90.453-71.04s-60.672-71.45-71.049-90.453
                        l-3.149-5.743c-3.161-5.612-1.705-12.695,3.413-16.606l38.792-30.182c12.412-9.725,15.279-27.351,6.588-40.508l-69.12-103.646
                        C109.12,1.056,91.25-2.966,77.461,5.323L34.12,31.358C20.502,39.364,10.511,52.33,6.242,67.539
                        c-15.607,56.866-3.866,155.008,140.706,299.597c115.004,114.995,200.619,145.92,259.465,145.92
                        c13.543,0.058,27.033-1.704,40.107-5.239c15.212-4.264,28.18-14.256,36.181-27.878l26.061-43.315
                        C517.063,422.832,513.043,404.951,499.639,396.039z M494.058,427.868l-26.001,43.341c-5.745,9.832-15.072,17.061-26.027,20.173
                        c-52.497,14.413-144.213,2.475-283.008-136.32S8.29,124.559,22.703,72.054c3.116-10.968,10.354-20.307,20.198-26.061
                        l43.341-26.001c5.983-3.6,13.739-1.855,17.604,3.959l37.547,56.371l31.514,47.266c3.774,5.707,2.534,13.356-2.85,17.579
                        l-38.801,30.182c-11.808,9.029-15.18,25.366-7.91,38.332l3.081,5.598c10.906,20.002,24.465,44.885,73.967,94.379
                        c49.502,49.493,74.377,63.053,94.37,73.958l5.606,3.089c12.965,7.269,29.303,3.898,38.332-7.91l30.182-38.801
                        c4.224-5.381,11.87-6.62,17.579-2.85l103.637,69.12C495.918,414.126,497.663,421.886,494.058,427.868z"
                                ></path>
                                <path
                                    fill="#00BBF9"
                                    d="M291.161,86.39c80.081,0.089,144.977,64.986,145.067,145.067c0,4.713,3.82,8.533,8.533,8.533s8.533-3.82,8.533-8.533
                        c-0.099-89.503-72.63-162.035-162.133-162.133c-4.713,0-8.533,3.82-8.533,8.533S286.448,86.39,291.161,86.39z"
                                ></path>
                                <path
                                    fill="#00BBF9"
                                    d="M291.161,137.59c51.816,0.061,93.806,42.051,93.867,93.867c0,4.713,3.821,8.533,8.533,8.533
                        c4.713,0,8.533-3.82,8.533-8.533c-0.071-61.238-49.696-110.863-110.933-110.933c-4.713,0-8.533,3.82-8.533,8.533
                        S286.448,137.59,291.161,137.59z"
                                ></path>
                                <path
                                    fill="#00BBF9"
                                    d="M291.161,188.79c23.552,0.028,42.638,19.114,42.667,42.667c0,4.713,3.821,8.533,8.533,8.533s8.533-3.82,8.533-8.533
                        c-0.038-32.974-26.759-59.696-59.733-59.733c-4.713,0-8.533,3.82-8.533,8.533S286.448,188.79,291.161,188.79z"
                                ></path>
                            </g>
                        </svg>
                        <div class="text">
                            <p class="title">Технічна підтримка</p>
                            <p class="info">support@elves.org.ua</p>
                        </div>
                    </div>
                    <div class="info-block">
                        <svg
                            class="h-40 pr-2 pr-xl-3"
                            version="1.1"
                            xmlns="//www.w3.org/2000/svg"
                            xmlns:xlink="//www.w3.org/1999/xlink"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill="#00BBF9"
                                d="M16.32 17.113c1.729-1.782 2.68-4.124 2.68-6.613 0-2.37-0.862-4.608-2.438-6.355l0.688-0.688 0.647 0.646c0.098 0.098 0.226 0.146 0.353 0.146s0.256-0.049 0.353-0.146c0.195-0.195 0.195-0.512 0-0.707l-2-2c-0.195-0.195-0.512-0.195-0.707 0s-0.195 0.512 0 0.707l0.647 0.646-0.688 0.688c-1.747-1.576-3.985-2.438-6.355-2.438s-4.608 0.862-6.355 2.438l-0.688-0.688 0.646-0.646c0.195-0.195 0.195-0.512 0-0.707s-0.512-0.195-0.707 0l-2 2c-0.195 0.195-0.195 0.512 0 0.707 0.098 0.098 0.226 0.146 0.354 0.146s0.256-0.049 0.354-0.146l0.646-0.646 0.688 0.688c-1.576 1.747-2.438 3.985-2.438 6.355 0 2.489 0.951 4.831 2.68 6.613l-2.034 2.034c-0.195 0.195-0.195 0.512 0 0.707 0.098 0.098 0.226 0.147 0.354 0.147s0.256-0.049 0.354-0.147l2.060-2.059c1.705 1.428 3.836 2.206 6.087 2.206s4.382-0.778 6.087-2.206l2.059 2.059c0.098 0.098 0.226 0.147 0.354 0.147s0.256-0.049 0.353-0.147c0.195-0.195 0.195-0.512 0-0.707l-2.034-2.034zM1 10.5c0-4.687 3.813-8.5 8.5-8.5s8.5 3.813 8.5 8.5c0 4.687-3.813 8.5-8.5 8.5s-8.5-3.813-8.5-8.5z"
                            ></path>
                            <path
                                fill="#00BBF9"
                                d="M15.129 7.25c-0.138-0.239-0.444-0.321-0.683-0.183l-4.92 2.841-3.835-2.685c-0.226-0.158-0.538-0.103-0.696 0.123s-0.103 0.538 0.123 0.696l4.096 2.868c0.001 0.001 0.002 0.001 0.002 0.002 0.009 0.006 0.018 0.012 0.027 0.017 0.002 0.001 0.004 0.003 0.006 0.004 0.009 0.005 0.018 0.010 0.027 0.015 0.002 0.001 0.004 0.002 0.006 0.003 0.010 0.005 0.020 0.009 0.031 0.014 0.006 0.003 0.013 0.005 0.019 0.007 0.004 0.001 0.008 0.003 0.013 0.005 0.007 0.002 0.014 0.004 0.021 0.006 0.004 0.001 0.008 0.002 0.012 0.003 0.007 0.002 0.014 0.003 0.022 0.005 0.004 0.001 0.008 0.002 0.012 0.002 0.007 0.001 0.014 0.002 0.021 0.003 0.005 0.001 0.010 0.001 0.015 0.002 0.006 0.001 0.012 0.001 0.018 0.002 0.009 0.001 0.018 0.001 0.027 0.001 0.002 0 0.004 0 0.006 0 0 0 0-0 0-0s0 0 0.001 0c0.019 0 0.037-0.001 0.056-0.003 0.001-0 0.002-0 0.003-0 0.018-0.002 0.036-0.005 0.054-0.010 0.002-0 0.003-0.001 0.005-0.001 0.017-0.004 0.034-0.009 0.050-0.015 0.003-0.001 0.006-0.002 0.008-0.003 0.016-0.006 0.031-0.012 0.046-0.020 0.004-0.002 0.007-0.004 0.011-0.006 0.005-0.003 0.011-0.005 0.016-0.008l5.196-3c0.239-0.138 0.321-0.444 0.183-0.683z"
                            ></path>
                        </svg>
                        <div class="text">
                            <p class="title">Час роботи</p>
                            <p class="info">
                                Пн - Пт: 8:00 - 19:00 <br />
                                Сб: 9:00 - 15:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="title-line"><span>Медичний</span> центр</div>
            <div class="container">
                <div class="main__inner">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="img/slider/1.jpg" alt="slide-1" />
                                <div class="overlap"></div>
                                <p class="title">Кардіологія</p>
                                <p class="description">лікуємо захворювання серцево-судинної системи</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="img/slider/2.jpg" alt="slide-2" />
                                <div class="overlap"></div>
                                <p class="title">Травмотологія</p>
                                <p class="description">лікуємо пацієнтів з гострою травмою</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="img/slider/3.jpg" alt="slide-3" />
                                <div class="overlap"></div>
                                <p class="title">Педіатрія</p>
                                <p class="description">діагностуємо дітей віком від 0 до 18 років</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="img/slider/4.jpg" alt="slide-4" />
                                <div class="overlap"></div>
                                <p class="title">Офтамологія</p>
                                <p class="description">лікуємо очні захворювання</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="img/slider/5.jpg" alt="slide-5" />
                                <div class="overlap"></div>
                                <p class="title">Алергологія</p>
                                <p class="description">займаємося виявленням алергічних захворювань і їх лікуванням</p>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="about">
                        <div class="left-side">
                            <p class="title">Елвейс - ваше здоров'я в руках професіоналів</p>
                            <p class="description">
                                <span>
                                    Медичний центр «Елвейс» - медичний центр в місті Суми, якому щодня довіряють своє
                                    здоров'я тисячі сумчан.
                                </span>
                                <br /><br />
                                <span>
                                    Надаючи послуги з 2002 року, ми встигли стати одною з кращих медичний установ.
                                </span>
                                <br /><br />
                                <span>
                                    Відповідальний підхід, професіоналізм і увага до кожного клієнта ви зможете оцінити
                                    з перших хвилин перебування в клініці!
                                </span>
                            </p>
                        </div>
                        <div class="right-side">
                            <img src="img/medical-center.jpg" alt="sign-up" />
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <p class="form-title">Записатися до лікаря</p>
                        <form action="admin/includes/add_patient.php" method="POST" class="form" id="form">
                            <p id="error">Перевірте правильність заповнення полів</p>
                            <?php
                                if($_GET['succes'] === 'true') {
                                    $message = 'Заявку успішно відправлено!';
                                    $class = 'succes';
                                } else if($_GET['succes'] === 'false') {
                                    $message = 'Щось пішло не так, повторіть спробу пізніше!';
                                    $class = 'errorMessage';
                                }
    
                                echo "<p class='$class'>$message</p>";
                            ?>
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
                            <input
                                type="text"
                                name="phone"
                                placeholder="Номер телефону"
                                class="form__field"
                                id="phoneField"
                            />
                            <select name="doctor" class="form__field form__select" id="doctor">
                                <option value="Оберіть лікаря" selected disabled>Оберіть лікаря</option>
                                <?php
                                    for($i = 0; $i < count($doctors_result); $i++) {
                                        $curr_doctor = $doctors_result[$i];
                                        echo '<option value="'.$curr_doctor['id'].'">'.$curr_doctor['third_name'].' '.$curr_doctor['name'].' '.$curr_doctor['surname'].' - '.$curr_doctor['specialization'].'</option>';
                                    }
                                ?>
                            </select>
                            <button class="form__btn">Записатися до лікаря</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="container">
                <div class="footer__inner">
                    <div class="left-side">
                        <div class="center-info">
                            <div class="logo">
                                <img src="img/logo.svg" alt="logo" />
                                <p>Елвейс</p>
                            </div>
                            <p class="text">
                                При відвідуванні клініки ви можете бути впевнені, що знаходитеся в самих надійних руках.
                                Ваше здоров'я для нас - це першочергове завдання.
                            </p>
                        </div>
                    </div>
                    <div class="right-side">
                        <div class="info-block">
                            <p class="title">Графік роботи</p>
                            <p class="line">Пн - Пт: 8:00 - 19:00</p>
                            <p class="line">Сб: 9:00 - 15:00</p>
                            <p class="line">Нд: вихідний</p>
                        </div>
                        <div class="info-block second">
                            <p class="title">Контакти</p>
                            <div class="line">
                                <svg
                                    class="mr-2"
                                    xmlns="//www.w3.org/2000/svg"
                                    xmlns:xlink="//www.w3.org/1999/xlink"
                                    aria-hidden="true"
                                    focusable="false"
                                    width="0.75em"
                                    height="1em"
                                    preserveAspectRatio="xMidYMid meet"
                                    viewBox="0 0 768 1024"
                                >
                                    <path
                                        d="M388 0q-78 0-149.5 31.5t-123.5 84T31.5 240 0 390q0 44 12 92t28 89 46 91 53.5 84.5 63.5 84 62 75.5 62 72q12 14 18 20 2 3 7 7.5t18 11.5 25 7h3q28 0 50-26 320-368 320-608 0-167-102-277Q560 0 388 0zm12 955q-1 2-4 4l-4-4-17-19q-38-44-59-68.5T257 796t-60-79.5-51-79-44.5-84-26.5-81T64 390q0-87 44-162.5T226.5 108 388 64q79 0 141 27.5t99.5 74.5T685 270t19 120q0 216-304 565zm-15-762q-31 0-60.5 10t-53 27.5T230 272t-27.5 53-9.5 60q0 80 56.5 136t136 56T521 521t56-136q0-39-15-74.5t-41-61-61.5-41T385 193zm0 320q-53 0-91-38t-38-91 37.5-90.5T384 256t90.5 37.5T512 384q0 66-53 105-33 24-74 24z"
                                        fill="#888"
                                    ></path>
                                </svg>
                                <p>Україна, м. Суми, вул. Прокоф'єва, 23</p>
                            </div>
                            <div class="line">
                                <svg
                                    class="mr-2"
                                    xmlns="//www.w3.org/2000/svg"
                                    xmlns:xlink="//www.w3.org/1999/xlink"
                                    aria-hidden="true"
                                    focusable="false"
                                    width="1em"
                                    height="1em"
                                    preserveAspectRatio="xMidYMid meet"
                                    viewBox="0 0 1008 1008"
                                >
                                    <path
                                        d="M246 37q57 78 134 200 19 32-6 79-8 16-48 89 8 12 18.5 25t22.5 27.5 26 29.5 29.5 31.5T455 552q88 88 146 130 65-38 89-50 25-14 48-14 18 0 31 8 89 54 202 134 20 16 24 42 3 27-17 58-8 12-31 40-21 26-63.5 66t-69.5 40h-2q-103-4-229-81T307 699Q8 399 0 194q0-27 40-71 39-42 65-63 26-20 42-31 21-15 49-15 32 0 50 23zm-64 41q-39 28-76 65-36 36-42 53 8 180 287.5 459T812 944q15-6 51-43t65-77q3-4 4-7.5t0-6.5q-115-80-194-130-8 0-20 6-4 2-32 18t-55 30l-33 20-33-22q-63-43-155-137-90-91-135-155l-24-31 20-35q37-67 48-87 6-12 6-20-34-54-66-102.5T198 74h-2q-8 0-14 4z"
                                        fill="#888"
                                    ></path>
                                </svg>
                                <p>+380663832883</p>
                            </div>
                            <div class="line">
                                <svg
                                    class="mr-2"
                                    xmlns="//www.w3.org/2000/svg"
                                    xmlns:xlink="//www.w3.org/1999/xlink"
                                    aria-hidden="true"
                                    focusable="false"
                                    width="1em"
                                    height="1em"
                                    preserveAspectRatio="xMidYMid meet"
                                    viewBox="0 0 1024 1024"
                                >
                                    <path
                                        d="M1023 473q0-4-1-8t-2.5-8-3.5-7.5-5-6.5l-1-1q-2-3-5-6l-6-6L582 27Q555 0 514 0t-68 27L29 427q-6 6-12 13T5.5 458.5 0 481v479q0 27 19 45.5t45 18.5h896q17 0 32-8.5t23.5-23.5 8.5-32V478l-1-5zM270 726L64 916V545zm66 27l6-6 1-1 141-130q11-9 25-9t24 8l384 345H110zm421-22l203-180v362zM104 443L491 72q10-9 23-9t23 9l361 345h-1l55 55-242 215-136-121q-18-15-41-20t-47 0-43 21L317 683 75 469l27-26h2z"
                                        fill="#888"
                                    ></path>
                                </svg>
                                <p>elves@gmail.com</p>
                            </div>
                        </div>
                        <div class="info-block social-links">
                            <p class="title">Ми в соціальних мережах</p>
                            <div class="icons">
                                <a href="https://www.facebook.com/" target="_blank"
                                    ><img src="img/facebook.svg" alt="facebook"
                                /></a>
                                <a href="https://www.instagram.com/" target="_blank"
                                    ><img src="img/instagram.svg" alt="instagram"
                                /></a>
                                <a href="https://web.telegram.org/" target="_blank"
                                    ><img src="img/telegram.svg" alt="telegram"
                                /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/libs.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
