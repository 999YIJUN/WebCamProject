<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <?php $this->load->view('common/stylesheet'); ?>
    <link href="<?php echo base_url('theme/css/style.css'); ?>" rel="stylesheet">
    <style>
        table,
        footer {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <?php $this->load->view('main'); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>分類管理</h1>
        </div>
        <div class="container-sm">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($categories as $category) : ?>
                    <div class="col">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title text-center categoryName"><?= $category->category_name; ?> <i class="fa-regular fa-pen-to-square editCategoryName" style="color: #f64747;"></i></h5>
                                <form action="">
                                    <select name="url_select" class="form-select form-select-lg mb-2" id="url_select">
                                        <option value="" selected disabled hidden></option>
                                        <?php foreach ($settings as $setting) : ?>
                                            <option value="<?= $setting['url']; ?>" <?php if ($setting['url'] == $category->url) : ?> selected <?php endif ?>><?= $setting['url']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="text-center">
                                        <button class="btn btn-primary btnData" data-category_name="<?= $category->category_name; ?>">儲存</button>
                                        <button class="btn btn-secondary btnEdit" data-category_name="<?= $category->category_name; ?>" data-id="<?= $category->category_id; ?>" disabled>修改</button>
                                        <button class="btn btn-danger btnDelete" data-category_name="<?= $category->category_name; ?>">刪除</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php $this->load->view('footer'); ?>

    <script>
        $(function() {
            // URL 修改
            $('.btnData').on('click', function(e) {
                e.preventDefault();
                const category_name = $(this).data('category_name');
                let selectedUrl = $(this).closest('.card-body').find('#url_select').val();
                const formData = '&selectedUrl=' + selectedUrl + '&category_name=' + category_name; // 加入 category_name
                console.log('FormData:', formData);
                // var cardBody = event.target.closest('.card-body');
                // var selectElement = cardBody.querySelector('select');
                // var selectedValue = selectElement.value;
                console.log(selectedUrl);
                if (selectedUrl) {
                    axios.post("<?= site_url('category/url_edit'); ?>", formData)
                        .then(function(response) {
                            const get_data = response.data;
                            console.log('成功:', response.data);
                            // 使用 setTimeout 延遲顯示 alert
                            if (get_data.success) {

                                setTimeout(function() {
                                    Swal.fire({
                                        title: "成功!",
                                        text: "已完成修改!",
                                        icon: "success",
                                        confirmButtonText: '確定',
                                        confirmButtonColor: '#3085d6',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                }, 100);
                            }
                        })
                        .catch(function(error) {
                            console.error('錯誤', error);
                        });
                } else {
                    setTimeout(function() {
                        Swal.fire({
                            title: "提醒!",
                            text: "尚未選擇項目，請選擇再繼續!",
                            icon: "info",
                            confirmButtonText: '確定',
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {});
                    }, 100);
                }
            });

            // 分類名稱修改
            $('.btnEdit').on('click', function(e) {
                e.preventDefault();
                const category_id = $(this).data('id');
                let category_name = $(this).closest('.card-body').find('.categoryNameInput').val().trim();
                console.log(category_name);
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('category/category_name_edit'); ?>',
                    data: {
                        category_id: category_id,
                        category_name: category_name
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('成功:', response);
                        const categoryNameInput = $('.categoryNameInput');
                        const categoryNameText = $('<h5 class="card-title text-center categoryName"></h5>').text(category_name);
                        categoryNameInput.replaceWith(categoryNameText);
                        if (response.success) {
                            Swal.fire({
                                title: "成功!",
                                text: "已完成修改!",
                                icon: "success",
                                confirmButtonText: '確定',
                                confirmButtonColor: '#3085d6',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else if (response.message_error) {
                            Swal.fire({
                                title: "提醒!",
                                text: "分類名稱不能為空!",
                                icon: "info",
                                confirmButtonText: '確定',
                                confirmButtonColor: '#3085d6',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "提醒!",
                                text: "分類姓名已存在!",
                                icon: "info",
                                confirmButtonText: '確定',
                                confirmButtonColor: '#3085d6',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('錯誤:', error);
                        Swal.fire({
                            title: "錯誤!",
                            text: "無法完成修改!",
                            icon: "error",
                            confirmButtonText: '確定',
                            confirmButtonColor: '#d33',
                        });
                    }
                });
            });

            // 刪除
            $('.btnDelete').on('click', function(e) {
                e.preventDefault();
                const category_name = $(this).data('category_name');
                console.log(category_name);
                Swal.fire({
                    title: '警告',
                    text: '刪除後資料將消失',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '確定',
                    cancelButtonText: '取消',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?= site_url('category/delete'); ?>',
                            type: 'POST',
                            data: {
                                category_name: category_name
                            },
                            success: function(response) {
                                console.log('成功:', response);
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error('錯誤:', error);
                            }
                        });
                    }
                });
            });
        });

        // EDIT ICON 
        $(document).on('click', '.editCategoryName', function() {
            const currentCard = $(this).closest('.card');
            const categoryName = currentCard.find('.categoryName');
            const categoryNameValue = categoryName.text();
            // console.log(categoryName);

            const inputGroup = $('<div class="input-group mb-2"></div>');
            const categoryNameInput = $('<input type="text" class="form-control categoryNameInput">');
            const closeButton = $('<span class="input-group-text"><i class="bi bi-x-lg" style="color: #f64747;"></i></span>');

            categoryNameInput.val(categoryNameValue);
            inputGroup.append(categoryNameInput);
            inputGroup.append(closeButton);
            categoryName.replaceWith(inputGroup); // 用 input-group 替換類別名稱元素
            currentCard.find('.btnEdit').prop('disabled', false);

            closeButton.on('click', function() {
                inputGroup.replaceWith(categoryName);
                currentCard.find('.btnEdit').prop('disabled', true);
            });
        });
    </script>
</body>

</html>