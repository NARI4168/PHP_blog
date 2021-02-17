<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta
        http-equiv="X-UA-Compatible" content="ie=edge">-->
        <title>upload</title>
        <link rel="stylesheet" href="/resource/app.css">
    </head>
    <body>
        <div class="container pop">

            <script type="text/javascript">

                //선택파일 미리보기
                function previewImage(f) {

                    var file = f.files;

                    // 확장자 체크
                    if (!/\.(gif|jpg|jpeg|png)$/i.test(file[0].name)) {
                        alert('gif, jpg, png 파일만 선택해 주세요.\n\n현재 파일 : ' + file[0].name);

                        // 선택한 파일 초기화
                        f.outerHTML = f.outerHTML;

                        document
                            .getElementById('preview')
                            .innerHTML = '';

                    } else {

                        // FileReader 객체 사용
                        var reader = new FileReader();

                        // 파일 읽기가 완료되었을때 실행
                        reader.onload = function (rst) {
                            document
                                .getElementById('preview')
                                .innerHTML = '<img src="' + rst.target.result + '" width=400 height=400 />';
                        }

                        // 파일을 읽는다
                        reader.readAsDataURL(file[0]);

                    }
                }

                // 파일 업로드
                function formSubmit(f) {

                    // 파일 확장자를 제한
                    var extArray = new Array(
                        'hwp',
                        'xls',
                        'doc',
                        'xlsx',
                        'docx',
                        'pdf',
                        'jpg',
                        'gif',
                        'png',
                        'txt',
                        'ppt',
                        'pptx'
                    );
                    var path = document
                        .getElementById("upfile")
                        .value;

                    if (path == "") {
                        alert("파일을 선택해 주세요.");
                        return false;
                    }

                    var pos = path.indexOf(".");

                    if (pos < 0) {
                        alert("확장자가 없는파일 입니다.");
                        return false;
                    }

                    var ext = path
                        .slice(path.indexOf(".") + 1)
                        .toLowerCase();
                    var checkExt = false;

                    for (var i = 0; i < extArray.length; i++) {

                        if (ext == extArray[i]) {
                            checkExt = true;
                            break;
                        }
                    }

                    if (checkExt == false) {
                        alert("업로드 할 수 없는 파일 확장자 입니다.");
                        return false;
                    }

                    return true;
                }
            </script>

            <form
                name="uploadForm"
                id="uploadForm"
                method="post"
                action="do_upload.php"
                enctype="multipart/form-data"
                onsubmit="return formSubmit(this);">
                <!--<label for="upfile">첨부파일</label>-->
                <input
                    type="file"
                    style="border: double 3px;"
                    name="upfile"
                    id="upfile"
                    accept="image/*"
                    onchange="previewImage(this)"/>
                &nbsp
                <input type="submit" style="font-size: 20px" value="확인"/>

            </form>

            <!-- 미리보기-->
            <br>
            <div id="preview"></div>

        </div>
    </body>

</html>