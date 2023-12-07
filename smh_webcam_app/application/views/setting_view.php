<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <?php $this->load->view('stylesheet'); ?>
    <style>
        table,
        footer {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body class="d-flex flex-column">
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="d-flex align-items-center mb mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <img src="<?php echo base_url('theme/img/thumbnail.png'); ?>" class="img-thumbnail" alt="Setting" onclick="window.location.href='<?php echo base_url('web/index'); ?>'">
                <span class="fs-4 px-2">羅東聖母</span>
            </div>
            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form> -->
        </div>
    </header>

    <main class="flex-grow-1">
        <div class="container-sm">
            <button class="btn btn-primary mb-2" onclick="window.location.href='<?php echo base_url('setting/add'); ?>'">新增</button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">網址</th>
                        <th scope="col">修改日期</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($setting as $set) : ?>
                        <tr>
                            <td><?php echo $set['url']; ?></td>
                            <td><?php echo $set['modifytime']; ?></td>
                            <td>
                                <?php
                                $id = $set['id'];
                                $encoded_id = base64_encode($id);
                                echo '<a href="' . base_url('setting/edit/' . $encoded_id) . '"> <i class="fa-solid fa-chevron-right" style="color:black"></i></a>';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
</body>

</html>