<?php 
  include "./lib/dbconn.php";
  session_start();
  //로그인을 하면 session에 정보를 저장하고 각 페이지들에서 모두 사용하고자 함.
    //로그인에 띠라 화면구성이 다르기에 세션에 저장되어 있는 회원정보 중 id, name, level 값 읽어오기

    $userid="";
    $username="";
    $userlevel=""; //회원등급 : 1~9등급 [1등급:관리자, 9등급:신규회원]
    $userpoint="";
    
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['username'])) $username= $_SESSION['username'];
    if( isset($_SESSION['userlevel'])) $userlevel= $_SESSION['userlevel'];
    if( isset($_SESSION['userphnum'])) $userpoint= $_SESSION['userphnum'];
    
  if( isset($_SESSION['lat'])|| isset($_SESSION['lat'])){
      $lat=$_SESSION['lat'];
      $lng=$_SESSION['lng'];
  }
  else{
  $apiKey = 'AIzaSyAgknUPj1dae6P2qe5Z7FNuxTn7sinn5_4'; // 발급받은 API 키
  $url = 'https://www.googleapis.com/geolocation/v1/geolocate?key=' . $apiKey;
  $data = array('considerIp' => 'true'); // API 요청 데이터
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  
  $result2 = curl_exec($ch); // API 응답 받아오기
  
  curl_close($ch);
  
  $response = json_decode($result2, true); // JSON 데이터 파싱
  
  $lat = $response['location']['lat']; // 현재 위치 위도
  $lng = $response['location']['lng']; // 현재 위치 경도
  }
  if( !(isset( $_SESSION[ 'userid' ] )) ) {
    echo "
            <script>
                alert('로그인후 사용해주세요');
                history.back();
            </script>
                ";
            exit;
  }

  include "./lib/dbconn.php";

 $userid="";
 $username="";
 $userlevel=""; //회원등급 : 1~9등급 [1등급:관리자, 9등급:신규회원]
 $userpoint="";
    
 if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
 if( isset($_SESSION['username'])) $username= $_SESSION['username'];
 if( isset($_SESSION['userlevel'])) $userlevel= $_SESSION['userlevel'];
 if( isset($_SESSION['userphnum'])) $userpoint= $_SESSION['userphnum'];
$sql= "SELECT * FROM like_board where id='$userid' ";
$result= mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BGS</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="./css/search.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand fw-bolder" href="./index.php">BGS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">홈</a></li>
                        <li class="nav-item"><a class="nav-link active" href="./like.php">좋아요</a></li>
                        <li class="nav-item"><a class="nav-link active" href="./mypage/my_page.php">마이페이지</a></li>
                        <li class="nav-item"><a class="nav-link active" href="./main3.php">위치변경</a></li>
                    </ul>
                    <ul class="navbar-nav">
                     <!-- 로그인 안되었을 때 -->
                        <?php if(!$userid){  ?>
                            <a style="font-size: 17px" class="navbar-brand" href="./member/member_form.php">회원가입</a></li>
                            <a style="font-size: 17px" class="navbar-brand" href="./login/login_form2.php">로그인</a></li>
                        <?php }else{ ?>
                            <a style="font-size: 17px" class="navbar-brand" href="./login/logout.php">로그아웃</a></li>
                        <?php }?>

                        <!-- 관리자모드로 로그인되었을 때 추가로.. -->
                        <?php if($userlevel==1){?>
                            <a style="font-size: 17px" class="navbar-brand" href="./admin/admin_form.php">관리자모드</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-warning py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                <fieldset class="main-search">
                <form method='post' action='./search/search3.php' name='search'>
                    <legend>전체 검색</legend>
                    <label class="search-word" for="main-search">
                        <span class="search-icon">검색 :</span>
                        <input id="main-search" class="HomeSearchInput" name="main-search" type="text" maxlength="50" placeholder="지역, 식당 또는 음식"/>
                    </label>
                    <input class="btn-search" type="submit" value="검색" />
                </form>    
                </fieldset>
                </div>
            </div>
        </header>
        <section class="py-5"> 
            <div class="container px-2 px-lg-3 mt-6">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    while ($row = $result -> fetch_assoc()){
                        $num2=$row['food_id'];
                        $sql2= "SELECT * FROM food where num='$num2' ";
                        $result2= mysqli_query($conn,$sql2);
                    ?> 
                    <?php
                        while($row2=$result2->fetch_assoc()){
                            ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="./fimg/<?=$row2['image']?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$row2['name']?></h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    아산시 신창면
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./count.php?no=<?= $row['num']?>">더보기</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-warning">
            <div class="container"><p class="m-0 text-center text-black">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>