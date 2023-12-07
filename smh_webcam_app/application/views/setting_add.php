<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <?php $this->load->view('stylesheet'); ?>
    <style>
        .form-setting {
            width: 100%;
            max-width: 500px;
            padding: 15px;
            margin: auto;
        }

        main {
            border-radius: 8px;
            border: 1px solid rgb(218, 220, 224);
            box-shadow: none;
        }
    </style>
</head>

<body class="d-flex flex-column">
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="d-flex align-items-center mb mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <img src="<?php echo base_url('theme/img/thumbnail.png'); ?>" class="img-thumbnail" alt="Setting" onclick="window.location.href='<?php echo base_url('setting/index'); ?>'">
                <span class="fs-4 px-2">羅東聖母</span>
            </div>
        </div>
    </header>
    <main class="form-setting flex-grow-1 my-5">
        <form method="post" action="<?php echo site_url('setting/create'); ?>">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">網址:</label>
                <input type="text" name="url" class="form-control form-control-lg" id="formGroupExampleInput" required>
                <!-- 
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">https://web.com/users/</span>
                    <input type="text" name="url" class="form-control form-control-lg" id="basic-url" aria-describedby="basic-addon3">
                </div> -->
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#myModal">確定</button>
        </form>
        <?php if ($this->session->flashdata('error_message')) : ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">提示</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='<?php echo base_url('setting/add'); ?>'"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.href='<?php echo base_url('setting/add'); ?>'">關閉</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <br><br><br><br>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>
        <?php if ($this->session->flashdata('success_message')) : ?>
            <div id="successAlert" class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>
    </main>
    <footer class="flex-shrink-0 bg-dark text-white-50">
        <div class="d-flex justify-content-center align-items-center my-4 border-top">
            <div class="col-md-7 text-center">
                <span class="text-muted">Copyright © Saint Mary's Hospital Luodong 2023</span>
            </div>
        </div>
        </div>
    </footer>
    <?php $this->load->view('script'); ?>
    <script>
        $(document).ready(function() {
            $("#successAlert").delay(5000).fadeOut('slow', function() {
                $(this).remove();
            });
        });

        function combineValues() {
            var prefix = document.getElementById("basic-addon3").innerText; // 取得<span>元素的文字
            var inputContent = document.getElementById("basic-url").value; // 取得<input>欄位的值

            var completeUrl = prefix + inputContent; // 將文字與值結合在一起
            document.getElementById("complete-url").value = completeUrl; // 將結合後的值放入隱藏欄位

            document.getElementById("myForm").submit(); // 提交表單
        }
    </script>
    <?php
    if (isset($_GET['show_modal']) && $_GET['show_modal'] == 'true') {
        echo '<script>
                  $(document).ready(function(){
                      $("#myModal").modal("show");
                  });
              </script>';
    }
    ?>
</body>

</html>