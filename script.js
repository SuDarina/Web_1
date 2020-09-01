let y;
let x;
let r;
let message;

jQuery('document').ready(function () {

    // проверка правильности ввода значения Y
    jQuery('#inY').on('keyup', function () {

        let img_y = document.createElement("img");
        img_y.src = "https://dropi.ru/img/uploads/2018-08-27/5_original.jpeg";
        img_y.width = 250;

        y = jQuery('#inY').val();
        y = parseFloat(y);

        if (y >= 3 || y <= -3) {
            message = "Y должен быть в пределах\n(-3; 3)";
            jQuery('#first_line').html(img_y);
        } else {
            message = "";
            jQuery('#first_line').html('')

        }
        jQuery('#answer').html(message);
    })

    // работа с checkbox (X)
    document.querySelectorAll('.xx').forEach(element => {
        element.onclick = function () {

            let v1 = document.querySelector(".xx[value = 'a-2']");
            let v2 = document.querySelector(".xx[value = 'a-15']");
            let v3 = document.querySelector(".xx[value = 'a-1']");
            let v4 = document.querySelector(".xx[value='a-05']");
            let v5 = document.querySelector(".xx[value='a0']");
            let v6 = document.querySelector(".xx[value='a05']");
            let v7 = document.querySelector(".xx[value='a1']");
            let v8 = document.querySelector(".xx[value='a15']");
            let v9 = document.querySelector(".xx[value='a2']");


            let limit = 1;
            jQuery(".xx").on("change", function(){
                if( jQuery(this).siblings(":checked").length >= limit){
                    this.checked = false;
                }
            });

            if (v1.checked) {
                x = "-2";
            } else if (v2.checked) {
                x = "-1.5";
            } else if (v3.checked) {
                x = "-1";
            } else if (v4.checked) {
                x = "-0.5";
            } else if (v5.checked) {
                x = "0";
            } else if (v6.checked) {
                x = "0.5";
            } else if (v7.checked) {
                x = "1";
            } else if (v8.checked) {
                x = "1.5";
            } else if (v9.checked) {
                x = "2";
            } else
                x = null;

            x = parseFloat(x);


        }
    });

    // работа с r
    let r1 = document.querySelector(".R[value='r1']");
    let r15 = document.querySelector(".R[value='r15']");
    let r2 = document.querySelector(".R[value='r2']");
    let r25 = document.querySelector(".R[value='r25']");
    let r3 = document.querySelector(".R[value='r3']");

    let arr = [r1, r15, r2, r25, r3];
    jQuery(".R[value='r1']").on('click', function () {
        r = "1";
        r = parseFloat(r);
        button_animation("r1", r1);

    });

    jQuery(".R[value='r15']").on('click', function () {
        r = "1.5";
        r = parseFloat(r);
        button_animation("r15", r15);

    });
    jQuery(".R[value='r2']").on('click', function () {
        r = "2";
        r = parseFloat(r);
        button_animation("r2", r2);

    });
    jQuery(".R[value='r25']").on('click', function () {
        r = "2.5";
        r = parseFloat(r);
        button_animation("r25", r25);

    });
    jQuery(".R[value='r3']").on('click', function () {
        r = "3";
        r = parseFloat(r);
        button_animation("r3", r3);


    });

    //отправка
    jQuery('#send').on('click', async function () {

        let dot = jQuery("#moving_dot");

        // адоптация x и y под график
        let cx = 55 + ((40*x)/r);
        let cy = 55 - ((40*y)/r);

        if (!isNaN(cx) && !isNaN(cy)) {
            dot.attr("r", 1.5);
            dot.attr("cx", cx);
            dot.attr("cy", cy);
        }

        if (x == null || r == null || isNaN(y) || y >= 3) {

            jQuery('#answer').html("Неправильные данные");

            let ans = document.createElement("img");
            ans.src = "https://www.syl.ru/misc/i/ai/383845/2504141.jpg";
            ans.width = 200;

            jQuery('#first_line').html(ans);

        } else if (y <= -3) {

            jQuery('#answer').html("Неправильные данные");

            let ans = document.createElement("img");
            ans.src = "https://www.syl.ru/misc/i/ai/383845/2504141.jpg";
            ans.width = 200;

            jQuery('#first_line').html(ans);

        } else {
            jQuery('#answer').html("");
            jQuery('#first_line').html("");
            const formdata = new FormData();
            formdata.append("x", x);
            formdata.append("y", y);
            formdata.append("r", r);

            fetch("check.php", {
                method: 'POST',
                body: formdata,
            })
                .then((response) => response.text())
                .then(res => {
                    document.querySelector('.main-table').innerHTML = res;
                    check_in()
                });
        }

    });

    // очистка

    jQuery('#clear').on('click', function () {

        jQuery("#moving_dot").attr("r", 0);

        fetch("clear.php", {
            method: 'POST',
        })
            .then((response) => response.text())
            .then(res => document.querySelector('.main-table').innerHTML=res)

    });

    function load(){
        fetch("table.php", {
            method: 'POST',
        })
            .then((response) => response.text())
            .then(res => document.querySelector('.main-table').innerHTML=res)

    }
    load();

    function button_animation(r_string, r){
        let elem = document.querySelector(".R[value="+r_string+"]");
        elem.classList.add("active_button");
        for (let el of arr) {
            if (el.classList.contains("active_button") && el !== r) {
                el.classList.remove("active_button");
            }
        }
    }
    function check_in(){

        let img_ok = document.createElement("img");
        img_ok.src = "https://avatars.mds.yandex.net/get-zen_doc/1549204/pub_5d259acd78125e00ad14b5f5_5d25a7668600e100ae6808e9/scale_1200";
        img_ok.width = 250;

        let img_wrong = document.createElement('img');
        img_wrong.src = "https://storyfox.ru/wp-content/uploads/2016/01/21113346500011.jpg";
        img_wrong.width = 250;

        let wrapper = document.querySelector(".wrapper")
        let table = wrapper.getElementsByTagName('table')[0];
        let row = table.lastElementChild;
        let child = row.lastElementChild;
        let res = child.querySelector('span');
        if (res.textContent === "yes") {
            jQuery('#answer').html("Ok");
            jQuery('#first_line').html(img_ok);
        } else {
            jQuery('#answer').html("не Ok");
            jQuery('#first_line').html(img_wrong);
        }
    }
})