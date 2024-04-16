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
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_modal">修改</h5>
                        <button type="button" class="btn-close" id="btnClose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <?= form_label('網址', 'e_url', ['class' => 'form-label']); ?>
                                    <input type="text" name="e_url" id="e_url" class="form-control form-control-lg">
                                    <div id="urlError" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnExit" data-bs-dismiss="modal">關閉</button>
                        <button type="submit" class="btn btn-primary" id="BtnSave">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('#BtnSave').click(function(e) {
                e.preventDefault();
                const formData = $('form').serialize();
                axios.post("<?= site_url('setting/edit'); ?>", formData)
                    .then(function(response) {
                        const get_data = response.data;
                        if (get_data.success) {
                            $('#btnExit').click();

                            // 使用 setTimeout 延遲顯示 alert
                            setTimeout(function() {
                                Swal.fire({
                                    title: "成功!",
                                    text: "已完成修改!",
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
                            $('#urlError').html(response.data.errors.url);
                        }
                    })
                    .catch(function(error) {
                        console.error('錯誤', error);
                    });
            });

            $('#btnExit, #btnClose').click(function(e) {
                init();
            });

            function init() {
                $('#urlError').html('');
            }
        })
    </script>
</body>

</html>