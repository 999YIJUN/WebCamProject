<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <link rel="stylesheet" rel="preload" as="style" onload="this.rel='stylesheet';this.onload=null" href="https://unpkg.com/normalize.css@8.0.0/normalize.css">
    <?php $this->load->view('common/stylesheet'); ?>
    <link href="<?php echo base_url('theme/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <?php $this->load->view('main'); ?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Web Camera</h1>
        </div>
        <section class="container" id="demo-content">
            <!-- <h1 class="title">Web Camera</h1> -->
            <div class="ratio ratio-21x9 mb-3">
                <video id="video" style="border: 1px solid gray"></video>
            </div>
            <div class="mb-3 row g-3">
                <div class="col-md-9" id="">
                    <label class="form-label">Result:</label>
                    <div class="form-control" style="height: 37.6px;"><code id="result"></code></div>
                </div>
                <div class="col-md-3 d-grid gap-2 d-md-flex justify-content-md-end align-items-end">
                    <button type="button" class="btn btn-primary" id="urlButton" disabled style="height: 37.6px;">查看資料</button>
                    <button type="button" class="btn btn-primary" id="startButton" disabled style="height: 37.6px;">開啟</button>
                    <button type="button" class="btn btn-primary" id="resetButton" disabled style="height: 37.6px;">重置</button>
                </div>
            </div>
            <div class="mb-3 row g-3">
                <div class="col-md-3" style="display: table">
                    <label for="category-style" class="form-label"> Category:</label>
                    <select id="category-style" name="category-style" class="form-control" size="1">
                        <option value="" disabled selected hidden></option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->category_name; ?>"><?= $category->category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-9" id="sourceSelectPanel" style="display:none">
                    <label for="sourceSelect" class="form-label">Change video source:</label>
                    <select id="sourceSelect" class="form-control">
                    </select>
                    <div class="col-md-3" style="display: table" hidden>
                        <label for="decoding-style" class="form-label"> Decoding Style:</label>
                        <select id="decoding-style" class="form-control" size="1">
                            <option value="once">單次</option>
                            <option value="continuously">連續</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->load->view('footer'); ?>
    <!-- <script src="https://unpkg.com/@zxing/library@latest"></script> -->
    <script src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"></script>
    <script>
        $(function() {
            $('#category-style').on('change', () => {
                $('#startButton').attr('disabled', false);
            });
        });

        window.addEventListener('load', function() {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserMultiFormatReader();
            console.log('ZXing code reader initialized');

            codeReader.listVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')

                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption);
                            // 鏡頭名稱有包含back的當預設鏡頭
                            if (element.label.toLowerCase().includes('back')) {
                                selectedDeviceId = element.deviceId;
                            }
                        })
                        //自訂預設鏡頭
                        sourceSelect.value = selectedDeviceId;

                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        };

                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }

                    document.getElementById('startButton').addEventListener('click', () => {
                        const category_name = $('#category-style').val();
                        console.log(category_name);
                        disabled_true();
                        codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                            if (result) {
                                console.log('Found QR code!', result);

                                $.ajax({
                                    url: '<?php echo base_url("web/checkCamValue"); ?>',
                                    type: 'POST',
                                    contentType: 'application/x-www-form-urlencoded',
                                    data: {
                                        resultText: result.text,
                                        category_name: category_name
                                    },
                                    success: function(response) {
                                        document.getElementById('result').textContent = response;
                                    },
                                    error: function() {
                                        document.getElementById('result').textContent = '發生錯誤';
                                    }
                                });

                            }
                            if (err && !(err instanceof ZXing.NotFoundException)) {
                                console.error(err)
                                document.getElementById('result').textContent = err
                            }
                        })
                        console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
                    })

                    document.getElementById('resetButton').addEventListener('click', () => {
                        codeReader.reset();
                        disabled_false();
                        document.getElementById('result').textContent = '';
                        console.log('Reset.')
                    })

                })
                .catch((err) => {
                    console.error(err)
                })
        });

        function disabled_true() {
            $('#sourceSelect').prop('disabled', true);
            $('#decoding-style').prop('disabled', true);
            $('#category-style').prop('disabled', true);
            $('#resetButton').prop('disabled', false);
            $('#startButton').prop('disabled', true);
        }

        function disabled_false() {
            $('#sourceSelect').prop('disabled', false);
            $('#decoding-style').prop('disabled', false);
            $('#category-style').prop('disabled', false);
            $('#resetButton').prop('disabled', true);
            $('#startButton').prop('disabled', false);
        }

        document.getElementById('urlButton').addEventListener('click', () => {
            var url = document.getElementById('result').textContent;
            window.location.href = url;
        });

        // 監聽 <code> 的變化
        // 選取目標節點
        const targetNode = document.getElementById('result');

        // 建立一個 MutationObserver 實例，並定義 callback 函式
        const observer = new MutationObserver(function(mutationsList, observer) {
            for (let mutation of mutationsList) {
                if (mutation.type === 'childList' || mutation.type === 'characterData') {
                    if (targetNode.textContent.trim() !== '') {
                        document.getElementById('urlButton').disabled = false;
                    } else {
                        document.getElementById('urlButton').disabled = true;
                    }
                }
            }
        });

        // 設定 MutationObserver 監聽的配置
        const config = {
            subtree: true,
            characterData: true,
            childList: true
        };

        // 開始監聽目標節點
        observer.observe(targetNode, config);
    </script>
</body>

</html>