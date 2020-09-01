<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>
        LabWork_1
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="graphic.css">
    <link rel="stylesheet" type="text/css" href="buttons.css">
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<table class="verst">
<!--    <tr class = "header">-->
    <tr style="background-color:#85C2FF; height: 50px" class = "header">

        <td  class="left">
            <div>Supriadkina Daria, P3230</div>
        </td>

        <td class="right">
            <div>Вариант 2624</div>
        </td>
    </tr>

<!--    фон-->
<!--    <tr style="height: 80%; border: 2px solid whitesmoke; border-collapse: collapse; background: #ffffff">-->
    <tr style="height: 700px; border: 2px solid whitesmoke; border-collapse: collapse; background: #ffffff">
<!--        фон-->
<!--        здесь можно прописать границу между частями страницы-->
        <td style="width: 55%; border: 2px solid whitesmoke; background: #ffffff;">
            <!--            Место для графика + кнопки-->

            <table>
                <tr>
                    <td style="width: 50%;">
                        <!--                        ГРАФИК-->

                            <svg width="300" height="300" viewBox="5 5 110 110" xmlns="http://www.w3.org/2000/svg">

                                <!--        оси-->
                                <line x1="5" x2="105" y1="55" y2="55" stroke="black"/>
                                <line x1="55" x2="55" y1="5" y2="105" stroke="black"/>
                                <!--        стрелки-->
                                <polyline points="50,10 55,5 60,10" fill="none" stroke="black"/>
                                <polyline points="100,50 105,55 100,60" fill="none" stroke="black"/>


                                <!--        +-r и +-r/2-->
                                <!--        y-->
                                <line x1="53" x2="57" y1="35" y2="35" stroke="black"/>
                                <line x1="53" x2="57" y1="15" y2="15" stroke="black"/>
                                <line x1="53" x2="57" y1="75" y2="75" stroke="black"/>
                                <line x1="53" x2="57" y1="95" y2="95" stroke="black"/>

                                <!--        x-->
                                <line x1="35" x2="35" y1="53" y2="57" stroke="black"/>
                                <line x1="15" x2="15" y1="53" y2="57" stroke="black"/>
                                <line x1="75" x2="75" y1="53" y2="57" stroke="black"/>
                                <line x1="95" x2="95" y1="53" y2="57" stroke="black"/>

                                <!--        I квадрант-->
                                <path class="figure" id="circle" d="M 55 15
                             A 40 40, 0, 0, 1, 95 55
                             L55 55 Z"/>


                                <!--        II квадрант-->
                                <rect class="figure" id="rectangle" x= "15" y="35" height="20" width="40"/>-->

                                <!--        III квадрант-->
                                <polygon class="figure" id="triangle" points="35,55 55,95 55,55"/>

                                <!--        подписи по оси x-->
                                <text x="35" y="63" style="font-size: 5px">-R/2</text>
                                <text x="15" y="63" style="font-size: 5px">-R</text>
                                <text x="75" y="63" style="font-size: 5px">R/2</text>
                                <text x="95" y="63" style="font-size: 5px">R</text>

                                <!--       подписи по оси y-->
                                <text x="60" y="35" style="font-size: 5px">R/2</text>
                                <text x="60" y="15" style="font-size: 5px">R</text>
                                <text x="60" y="75" style="font-size: 5px">-R/2</text>
                                <text x="60" y="95" style="font-size: 5px">-R</text>

                                <!--        точка-->
                                <circle id="moving_dot" r="0" cx="110" cy="110"/>

                            </svg>

                    </td>
                    <td>

<!--                        заполняемая форма-->
                        <form>
                            <table>
                            <tr style="height: 30%">
                                <td>
                                    <label>
                                        <!--                                        значение по y-->
                                        Y Value:<br>
                                        <input id="inY" type="number">
                                    </label>
                                </td>
                                <td>

                                    <div>
                                        <!--                                        значение по x-->
                                        X Value:<br>
                                        <input type = 'checkbox' class="xx" value="a-2">
                                        <label>-2</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a-15">
                                        <label>-1,5</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a-1">
                                        <label>-1</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a-05">
                                        <label>-0,5</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a0">
                                        <label>0</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a05">
                                        <label>0,5</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a1">
                                        <label>1</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a15">
                                        <label>1,5</label>
                                        <br />

                                        <input type = 'checkbox' class="xx" value="a2">
                                        <label>2</label>
                                        <br />

                                    </div>

                                </td>
                            </tr>

                            <!--                            значение по R-->

                            <tr style="height: 10%">
                                <td>
                                    <div>R Value:</div>

                                    <div class="dws">

                                        <button type="button" class="R" aria-label="center" value="r1"> 1 </button>
                                        <button type="button" class="R" aria-label="center" value="r15"> 1.5 </button>
                                        <button type="button" class="R" aria-label="centre" value="r2"> 2 </button>
                                        <button type="button" class="R" aria-label="center" value="r25"> 2.5 </button>
                                        <button type="button" class="R" aria-label="center" value="r3"> 3 </button>
                                    </div>

                                </td>

                            </tr>

                                <tr>
                                    <td class="send_wrapper">
                                        <button class="send_button" type="button" id="send" aria-label="center"> Отправить</button><br>
                                        <button class="send_button" type="button" id="clear" aria-label="center"> Очистить </button>
                                    </td>
                                </tr>

<!--                                сообщения-->
                                <tr id = "answer"></tr>
                                <tr id = "first_line"></tr>

                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <!--            Место для контента (таблица)-->

            <?php include "table.php" ?>

        </td>
    </tr>
<!--    <tr>-->
<!--        <td colspan="2" style="background-color:#85C2FF;text-align:center; vertical-align: bottom" >-->
<!--            © Sudarina 2020</td>-->
<!--    </tr>-->
</table>

</body>
</html>