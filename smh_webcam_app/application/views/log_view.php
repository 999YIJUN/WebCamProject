<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <?php $this->load->view('stylesheet'); ?>
</head>

<body class="d-flex flex-column">
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="d-flex align-items-center mb mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <img src="<?php echo base_url('theme/img/thumbnail.png'); ?>" class="img-thumbnail" alt="Setting">
                <span class="fs-4 px-2">羅東聖母</span>
            </div>
        </div>
    </header>
    <main class="flex-grow-1">
        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0" method="get">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="keyword">
            <button type="submit">搜尋</button>
        </form> -->
        <!-- <button type="button">還原</button> -->
        <div class="container-sm">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">log</th>
                        <th scope="col">日期</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($url_log as $log) : ?>
                        <tr>
                            <td><?php echo $log['log']; ?></td>
                            <td><?php echo $log['createtime']; ?></td>
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