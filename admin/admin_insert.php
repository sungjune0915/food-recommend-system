<?php
    $name= $_POST['name'];
    $type= $_POST['type'];
    $time= $_POST['time'];
    $tnum= $_POST['tnum'];
    $lat= $_POST['lat'];
    $lng= $_POST['lng'];
    // 등록일
    $regist_day= date("Y-m-d H:i"); //2020-01-08 (14:19)

    // 레벨은 신규회원은 9,포인트는 0점으로 기본설정

    include "../lib/dbconn.php";
    //insert 쿼리문
    $sql= "INSERT INTO food(name, type, time, tnum, regist_day,lat,lng) 
            VALUES('$name','$type','$time','$tnum','$regist_day','$lat','$lng')";

    // 쿼리문 실행
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    // 데이터 저장이 완료된 후 index.php로 페이지 이동
    echo "
        <script>
        window.location.href='../index.php';
        </script>
    ";
?>