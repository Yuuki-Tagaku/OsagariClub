$(function () {
  $('.category-Group-Button label span').on('click', function() {
    if($(this).attr("class") == "category") {
      $('.select-Category').removeClass("select-Category").addClass("category");
      $(this).removeClass("category").addClass("select-Category");
    }
  });
});

$(function() {
  $('.gender-Group label span').on('click', function() {
    if($(this).attr("class") == "gender") {
      $('.select-Gender').removeClass("select-Gender").addClass("gender");
      $(this).removeClass("gender").addClass("select-Gender");
    }
  });
});

$(function() {
  $('.condition-Group-Choice label span').on('click', function() {
    if($(this).attr("class") == "condition") {
      $('.select-Condition').removeClass("select-Condition").addClass("condition");
      $(this).removeClass("condition").addClass("select-Condition");
    }
  });
});

$(function(){
  $('.imgFile1').on('change',function(e){
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();

    //画像でない場合は処理終了
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }

    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        $("#img1").attr("src", e.target.result);
        $("#img1").attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
  });
});

$(function(){
  $('.imgFile2').on('change',function(e){
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();

    //画像でない場合は処理終了
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }

    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        $("#img2").attr("src", e.target.result);
        $("#img2").attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
  });
});

$(function(){
  $('.imgFile3').on('change',function(e){
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();

    //画像でない場合は処理終了
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }

    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        $("#img3").attr("src", e.target.result);
        $("#img3").attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
  });
});

$(function(){
  $('.imgFile4').on('change',function(e){
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();

    //画像でない場合は処理終了
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }

    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        $("#img4").attr("src", e.target.result);
        $("#img4").attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
  });
});