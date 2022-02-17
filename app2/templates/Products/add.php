<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
 
    <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="dist/js/bootstrap-colorpicker.js"></script> -->
    <script type="text/javascript">

</head>
<body>

<div class="container">
 
    <!-- navbar -->
    <!-- <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
 
            <div class="navbar-header">
                <a href="" class="navbar-brand">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="">menu1</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu2 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">submenu1</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">submenu2</a></li>
                    </ul>
                </li>
                <li><a href="">menu3</a></li>
            </ul>
        </nav>
    </div> -->
 
    <!-- content -->
    <div class="row" style="padding:80px 0 0 0">
 
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Menu
                </div>
                <!-- <div class="panel-body"> -->
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href=""><i class="glyphicon glyphicon-pencil"></i> 商品</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-download"></i>submenu2 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">submenu1</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#">submenu2</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="glyphicon glyphicon-leaf"></i> submenu3</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-folder-open"></i> submenu4</a></li>
                </ul> 
                <!-- </div> -->
            </div>
        </div>
 
        <!-- main -->
        <div class="col-md-9">
            <!-- apply custom style -->
            <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
            <h1><small>商品->商品登録</small></h1>
            </div>
 
            <form class="" action="" method="post" enctype="multipart/form-data">
            <?= $this->Form->create() ?>
            <fieldset>
            <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 200px;">
                <!-- name -->
                <div class="p-2 bd-highlight">
                    <label class="col-md-2">商品名</label>
                    <div class="col-sm-5">
                    <?php
                      echo $this->Form->control('name');
                      ?>
                        <p class="help-block" >商品名を入力してください</p>
                    </div>
                </div>

                <!-- nedan -->
                <div class="p-2 bd-highlight">
                    <label class="col-md-2 control-label">値段</label>
                    <div class="col-sm-5">
                    <?php
                      echo $this->Form->control('price');
                      ?>
                        <p class="help-block" >商品の値段を入力してください</p>
                    </div>
                </div>

                <div class="p-2 bd-highlight">
                    <label class="col-md-2 control-label">画像のアップロード</label>
                    <div class="col-sm-5">
                    <input type="file" name="image" value="" size="35">
                        <p class="help-block" >アップロードする画像を選択してください</p>
                    </div>
                </div>

  </div>

                
 
 
                <!-- gender -->
                <!-- <div class="form-group">
                    <label class="col-md-2 control-label">性別</label>
                    <div class="col-md-5">
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="gender" value="1" id="man">男
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="gender" value="2" id="woman">女
                            </label>
                        </div>
                    </div>
                </div>
  -->
                
 
 
                <!-- Colorpicker  -->
                <!-- <div class="form-group">
                    <label class="col-md-2 control-label">カラー選択</label>
                    <div class="col-sm-5">
                        <input id="cp1" type="text"  name="colorpicker" class="form-control" value="#5367ce" /> 
                        <script> $(function() { $('#cp1').colorpicker(); }); </script>
                        <p class="help-block">色を選択してね。</p>
                    </div>
                </div> -->
  
                <!-- Slide bar  -->
                <!-- <div class="form-group">
                    <label class="col-md-2 control-label">ボリューム</label>
                    <div class="col-sm-5">
                        <input type="range" name="num" min="0" max="100" step="5" value="50"
                         onchange="changeValue(this.value)">
                        <span id="val">50</span>
                        <script type="text/javascript">
                        function changeValue(value) {
                            document.getElementById("val").innerHTML = value;
                        }
                        </script>
                    </div>
                </div> -->
                </fieldset>
                <!-- submit  -->
                <div class="form-group">
                    <div class="col-md-offset-3">
                        <input type="button" value="Submit" class="btn btn-primary" onClick="check()">
                    </div>
                </div>
                <?= $this->Form->end() ?>
          </form>
        </div>
    </div>
</div>
 
<!-- footer -->
<div id="footer">copy left everything free.</div>
   </body>
</html>