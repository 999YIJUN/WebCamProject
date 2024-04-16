<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <?php $this->load->view('common/stylesheet'); ?>
    <link href="<?php echo base_url('theme/css/style.css'); ?>" rel="stylesheet">
    <style>
        .dataTables_filter {
            display: none;
        }

        @media (max-width: 767px) {
            .custom-second-column-width {
                width: 100%;
            }

            .not-compress {
                white-space: normal !important;
                /* 避免壓縮文字 */
                word-break: break-word;
                /* 使長單詞換行 */
            }
        }

        @media (max-width: 480px) {
            .custom-second-column-width {
                width: 100%;
            }

            .not-compress {
                white-space: normal !important;
                /* 避免壓縮文字 */
                word-break: break-word;
                /* 使長單詞換行 */
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('main'); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>URL管理</h1>
        </div>
        <div class="row g-3 mb-4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#insertModal">新增</button>
                <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('category/index'); ?>'">分類管理</button>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>URL</th>
                                        <th>修改日期</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('footer'); ?>
    <?php $this->load->view('setting/setting_add'); ?>
    <?php $this->load->view('setting/setting_edit'); ?>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                "pagingType": "full_numbers",
                "processing": true,
                "serverSide": true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "全部"]
                ],
                "order": [
                    [0, "asc"]
                ],
                "searching": true,
                "responsive": true,
                "ajax": {
                    "url": "<?php echo site_url('setting/get_data_user'); ?>",
                },
                "language": {
                    "url": "<?php echo base_url('theme/js/Chinese-traditional.json'); ?>"
                },
                "responsive": {
                    breakpoints: [{
                            name: 'desktop',
                            width: Infinity
                        },
                        {
                            name: 'tablet-l',
                            width: 1024
                        },
                        {
                            name: 'tablet-p',
                            width: 767
                        },
                        {
                            name: 'mobile-l',
                            width: 480
                        },
                        {
                            name: 'mobile-p',
                            width: 320
                        }
                    ]
                },
                "columnDefs": [{
                        "targets": 0,
                        "visible": false
                    },
                    {
                        "targets": 3,
                        "responsivePriority": 2,
                    },
                    {
                        "targets": 1,
                        "responsivePriority": 1,
                        "className": "not-compress"
                    },
                    {
                        "targets": "_all",
                        "className": "text-center" // 添加 text-center 類
                    }
                ]
            });
        });

        $('#datatable').on('click', '.btnEdit', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '<?= site_url('setting/get_setting_data'); ?>',
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#e_url').val(response.url);
                    console.log(response.id);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#datatable').on('click', '.btnDelete', function() {
            var Id = $(this).data('id');
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
                        url: '<?= site_url('setting/delete'); ?>',
                        type: 'POST',
                        data: {
                            Id: Id
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
    </script>
</body>

</html>