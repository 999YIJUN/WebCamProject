<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode掃描系統</title>
    <link rel="stylesheet" rel="preload" as="style" onload="this.rel='stylesheet';this.onload=null" href="https://unpkg.com/normalize.css@8.0.0/normalize.css">
    <?php $this->load->view('stylesheet'); ?>
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

    <main class="flex-grow-1 mb-3">
        <section class="container" id="demo-content">
            <h1 class="title">Web Camera</h1>
            <div class="ratio ratio-21x9 mb-3">
                <video id="video" style="border: 1px solid gray"></video>
            </div>

            <div class="mb-3" id="sourceSelectPanel" style="display:none">
                <label for="sourceSelect" class="form-label">Change video source:</label>
                <select id="sourceSelect" class="form-control">
                </select>
            </div>
            <div class="mb-3 row g-3">
                <div class="col-md-3" style="display: table">
                    <label for="decoding-style" class="form-label"> Decoding Style:</label>
                    <select id="decoding-style" class="form-control" size="1">
                        <option value="once">單次</option>
                        <option value="continuously">連續</option>
                    </select>
                </div>

                <div class="col-md-9" id="sourceSelectPanel">
                    <label class="form-label">Result:</label>
                    <div class="form-control" style="height: 37.6px;"><code id="result"></code></div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-primary" id="startButton">開啟</button>
                <button type="button" class="btn btn-primary" id="resetButton">重置</button>
            </div>
        </section>
    </main>

    <footer class="flex-shrink-0 bg-dark text-white-50">
        <div class="d-flex justify-content-center align-items-center my-4 border-top">
            <div class="col-md-7 text-center">
                <span class="text-muted">Copyright © Saint Mary's Hospital Luodong 2023</span>
            </div>
        </div>
        </div>
    </footer>

    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script>
        function decodeOnce(codeReader, selectedDeviceId) {
            codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
                console.log(result);

                // 發送 AJAX 請求到後端處理
                let xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo base_url("web/checkCamValue"); ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // 處理後端回傳的資料
                            document.getElementById('result').textContent = xhr.responseText;
                        } else {
                            // 處理錯誤
                            document.getElementById('result').textContent = '發生錯誤';
                        }
                    }
                };

                // 將解碼結果作為參數發送到後端 PHP 檔案
                let data = 'resultText=' + encodeURIComponent(result.text);
                xhr.send(data);
            }).catch((err) => {
                console.error(err);
                document.getElementById('result').textContent = err;
            });
        }


        function decodeContinuously(codeReader, selectedDeviceId) {
            codeReader.decodeFromInputVideoDeviceContinuously(selectedDeviceId, 'video', (result, err) => {
                if (result) {
                    // Properly decoded QR code
                    console.log('Found QR code!', result);

                    // Send AJAX request to backend for processing
                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', '<?php echo base_url("web/checkCamValue"); ?>', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Handle backend response
                                document.getElementById('result').textContent = xhr.responseText;
                            } else {
                                // Handle errors
                                document.getElementById('result').textContent = '發生錯誤';
                            }
                        }
                    };

                    // Send decoded result as parameter to the backend PHP file
                    let data = 'resultText=' + encodeURIComponent(result.text);
                    xhr.send(data);
                }

                if (err) {
                    // Handle specific exceptions (if needed)
                    if (err instanceof ZXing.NotFoundException) {
                        console.log('No QR code found.');
                    }

                    if (err instanceof ZXing.ChecksumException) {
                        console.log('A code was found, but its read value was not valid.');
                    }

                    if (err instanceof ZXing.FormatException) {
                        console.log('A code was found, but it was in an invalid format.');
                    }
                }
            });
        }

        window.addEventListener('load', function() {
            let selectedDeviceId;
            const codeReader = new ZXing.BrowserQRCodeReader();
            console.log('ZXing code reader initialized');

            codeReader.getVideoInputDevices()
                .then((videoInputDevices) => {
                    const sourceSelect = document.getElementById('sourceSelect')
                    selectedDeviceId = videoInputDevices[0].deviceId
                    if (videoInputDevices.length >= 1) {
                        videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            sourceSelect.appendChild(sourceOption)
                        })

                        sourceSelect.onchange = () => {
                            selectedDeviceId = sourceSelect.value;
                        };

                        const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                        sourceSelectPanel.style.display = 'block'
                    }

                    document.getElementById('startButton').addEventListener('click', () => {

                        const decodingStyle = document.getElementById('decoding-style').value;

                        if (decodingStyle == "once") {
                            decodeOnce(codeReader, selectedDeviceId);
                        } else {
                            decodeContinuously(codeReader, selectedDeviceId);
                        }

                        console.log(`Started decode from camera with id ${selectedDeviceId}`)
                    })

                    document.getElementById('resetButton').addEventListener('click', () => {
                        codeReader.reset()
                        document.getElementById('result').textContent = '';
                        console.log('Reset.')
                    })

                })
                .catch((err) => {
                    console.error(err)
                })
        })
    </script>
</body>

</html>