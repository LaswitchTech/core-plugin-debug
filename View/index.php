<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->label() ?></title>
        <script src="/js/jquery/js/jquery.min.js"></script>
        <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'style.php'; ?>
        <script>
            $(document).ready(function(){
                $('div.box pre .close').click(function(){
                    $(this).parent().hide();
                });
                $.ajax({
                    url: '/api/debug/execute',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success:', response);
                        for(const [key, value] of Object.entries(response)){
                            $('#success').append(`<strong>${key}</strong> = ${value}<br>`).show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', status, error);
                        for(const [key, value] of Object.entries({status: status, error: error})){
                            $('#error').append(`<strong>${key}</strong> = ${value}<br>`).show();
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="box">
            <pre class="box bg-success text-light rounded-2" id="success" style="display: none;"><i class="x close light"></i></pre>
            <pre class="box bg-danger text-light rounded-2" id="error" style="display: none;"><i class="x close light"></i></pre>
        </div>
        <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
            <div class="d-flex flex-column justify-content-center align-items-center" style="padding: 2rem;">
                <h1 class="w-100" style="padding-left: 48px;"><?= $this->label() ?></h1>
                <div>
                    <div class="btn-group">
                        <a href="/">Home</a>
                        <a href="/debug">Debug</a>
                        <a href="/debug/info">PHP Info</a>
                        <a href="/debug?vars">Variables</a>
                        <a href="/debug?csrf">CSRF</a>
                        <a href="/debug?auth">Auth</a>
                        <a href="/debug?locales">Locales</a>
                        <!-- <a href="/debug?database">Database</a> -->
                        <a href="/debug?smtp">SMTP</a>
                        <a href="/debug?router">Router</a>
                        <a href="/debug?clear">Clear</a>
                    </div>
                    <div class="d-flex flex-row align-items-center" style="margin-top: 24px;">
                        <i class="check"></i>
                        <i class="x"></i>
                        <i class="exclamation"></i>
                        <i class="question"></i>
                        <i class="dots"></i>
                    </div>
                    <div class="d-flex flex-row align-items-center" style="margin-top: 24px;">
                        <span class="rounded-circle bg-success" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-danger" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-warning" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-info" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-primary" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-secondary" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-white" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-light" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-light-gray" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-gray" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-dark-gray" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-dark" style="width: 32px; height: 32px;"></span>
                        <span class="rounded-circle bg-black" style="width: 32px; height: 32px;"></span>
                    </div>
                    <div class="d-flex flex-row align-items-center" style="margin-top: 24px;">
                        <div class="btn-group">
                            <button type="button" class="active">Button</button>
                            <button type="button">Button</button>
                            <button type="button">Button</button>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center" style="margin-top: 24px;">
                        <div class="btn-group">
                            <a class="active">Link</a>
                            <a>Link</a>
                            <a>Link</a>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center" style="margin-top: 24px;">
                        <div class="spinner"></div>
                        <div class="spinner spinner-25"></div>
                        <div class="spinner spinner-50"></div>
                        <div class="spinner spinner-75"></div>
                        <div class="spinner spinner-100"></div>
                    </div>
                    <div class="d-flex" style="margin-top: 24px;">
                        <pre class="debug bg-dark text-light p-2 rounded-2 vw-50 max-vh-50 overflow-auto"><?php require_once __DIR__ . '/debug.php'; ?></pre>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
