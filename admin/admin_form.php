<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>baegopa</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- member_form.php전용 스타일 -->
    <link rel="stylesheet" href="../css/member.css">

    <!-- 내부 자바스크립트 작성 -->

</head>
<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand fw-bolder" href="#!">배고파</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../index.php">홈</a></li>
                        <li class="nav-item"><a class="nav-link active" href="../like.php">좋아요</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">마이페이지</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="../message/message_form.php">쪽지</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="../search.php">검색</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <a style="font-size: 17px" class="navbar-brand" href='http://google.com/maps'>
                        map
                        </a>
                    </ul>

                </div>
            </div>
        </nav>
    <header class="bg-warning py-2">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <h1 class="display-4 fw-bolder">데이터 입력</h1>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                </div>
            </div>
    </header>
    <div class="container px-4"></div>
    <section class="py-5">
        <div id="main_content">
            <div id="join_box">
                <!-- DB의 member테이블에 저장하는 member_insert.php에 입력값들 전달하도록 -->
                <form action="./admin_insert.php" method="post" name="admin_form">
                    <!-- 각 줄마다 라벨, 인풋요소 영역으로 나누어 지므로 col1, col2 클래스지정으로 스타일링 -->
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2"><input type="text" name="name"></div>
                        <!-- id줄만 존재하는 칸 -->
                    </div>
                    <div class="form">
                        <div class="col1">종류</div>
                        <div class="col2"><input type="text" name="type"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">시간대</div>
                        <div class="col2"><input type="text" name="time"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">전화번호</div>
                        <div class="col2"><input type="text" name="telnum"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                    <div class="col1">위도</div>
                    <div class="col2"><input type="text" name="lat"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                    <div class="col1">경도</div>
                    <div class="col2"><input type="text" name="lng"></div>
                    </div>
                    <!-- input요소의 submit, reset으로 만들면 이미지로 못 만듬 -->
                    <!-- input요소의 타입 중 image 타입으로 하면 이미지 버튼이면서 submit 기능 -->
                    <!-- 값을 전송할 때 값이 비어있는지 검증하는 작업도 하고 싶어서.. -->
                    <!-- Javascript를 이용해서 submit()해보기 -->
                    <div class="bottom_line"></div>
                    <div class="buttons">
                        <img src="../img/button_save.gif" style="cursor:pointer" onclick="submitForm()">&nbsp;
                        <img src="../img/button_reset.gif" style="cursor:pointer" onclick="resetForm()">
                    </div>
                </form>
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
    <script>
        // 서밋 버튼 이미지 클릭시
        function submitForm(){

            // 입력값 중에 비어있으면 안되는 것들이 있음.

            // id칸이 비어 있는가?
            if(!document.admin_form.name.value){
                alert("이름을 입력하세요.");
                //커서(포커스)를 아이디 인풋요소로 이동
                document.admin_form.name.focus();
                //아래의 submit()을 하면 안되므로...
                return;
            }
            // 비밀번호 비어 있는가?
            if(!document.admin_form.type.value){
                alert("종류를 입력하세요.");
                document.admin_form.type.focus();
                return;
            }
             // 비밀번호 확인 비어 있는가?
             if(!document.admin_form.time.value){
                alert("시간을 입력하세요.");
                document.admin_form.time.focus();
                return;
            }
             // 이름 비어 있는가?
             if(!document.admin_form.telnum.value){
                alert("전화번호를 입력하세요.");
                document.admin_form.telnum.focus();
                return;
            }

            // form요소를 직접 submit하는 메소드
            document.admin_form.submit(); //겟 엘리먼트 안하고 폼, 인풋을 name속성이 document 배열로 찾을 수 있음.
        }

        // 초기화 버튼 이미지 클릭시
        function resetForm(){
            document.admin_form.name.value="";
            document.admin_form.type.value="";
            document.admin_form.time.value="";
            document.admin_form.telnum.value="";

            // 첫번째 입력 요소로 이동
            document.admin_form.name.focus();
        }


        var lineCount = 0;
        addAddressLine = function () {
            var i = document.createElement('input');
            i.setAttribute("type", "file");
            i.setAttribute("name", "file-input[]");
            var addressContainer = document.getElementById("add");
            addressContainer.appendChild(i);
        }


    </script>
</body>
</html>