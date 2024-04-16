<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-floating>.form-select {
            padding-top: 0;
            padding-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insert_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insert_modal">新增</h5>
                    <button type="button" class="btn-close" id="btnClose_Insert" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="container mb-3">
                            <div class="btn-group d-flex justify-content-center">
                                <input type="radio" class="btn-check" name="options" id="urlRadio" autocomplete="off" checked />
                                <label class="btn btn-warning" for="urlRadio" data-mdb-ripple-init>網址</label>

                                <input type="radio" class="btn-check" name="options" id="categoryRadio" autocomplete="off" />
                                <label class="btn btn-warning" for="categoryRadio" data-mdb-ripple-init>分類</label>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <?= form_label('網址', 'url', ['class' => 'form-label']); ?>
                                    <input type="text" name="url" id="url" class="form-control form-control-lg" placeholder="">
                                    <div id="urlErrorInsert" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <?= form_label('分類', 'category', ['class' => 'form-label']); ?>
                                    <input type="text" name="category" id="category" class="form-control form-control-lg" placeholder="" disabled>
                                    <div id="categoryErrorInsert" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnExit_Insert" data-bs-dismiss="modal">關閉</button>
                        <button type="submit" class="btn btn-primary" id="BtnSave_Insert">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#BtnSave_Insert').click(function(e) {
                e.preventDefault();
                const postData = $('form').serialize();
                let url;
                if (!$('#url').prop('disabled')) {
                    url = "<?= site_url('setting/insert'); ?>";
                } else if (!$('#category').prop('disabled')) {
                    url = "<?= site_url('category/insert'); ?>";
                }

                axios.post(url, postData)
                    .then(function(response) {
                        const get_data = response.data;
                        if (get_data.success) {
                            $('#btnExit_Insert').click();

                            // 使用 setTimeout 延遲顯示 alert
                            setTimeout(function() {
                                Swal.fire({
                                    title: "成功!",
                                    text: "已完成新增!",
                                    icon: "success",
                                    confirmButtonText: '確定',
                                    confirmButtonColor: '#3085d6',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }, 100);

                            console.log('成功:', response.data);
                        } else {
                            $('#urlErrorInsert').html(response.data.errors.url);
                            $('#categoryErrorInsert').html(response.data.errors.category);
                        }
                    })
                    .catch(function(error) {
                        console.error('錯誤', error);
                    });
            });

            $('#btnExit_Insert, #btnClose_Insert').click(function(e) {
                init();
            });

            function init() {
                $('#url').val('');
                $('#urlErrorInsert').html('');
                $('#categoryErrorInsert').html('');
            }

            $('#categoryRadio').on('click', () => {
                $('#category').prop('disabled', false);
                $('#url').prop('disabled', true);
                $('#urlErrorInsert').html('');
            });

            $('#urlRadio').on('click', () => {
                $('#category').prop('disabled', true);
                $('#url').prop('disabled', false);
                $('#categoryErrorInsert').html('');
            });
        })
    </script>
</body>

</html>