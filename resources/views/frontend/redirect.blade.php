<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Redirecting...</title>
    <script type="text/javascript">
        window.onload = () => {
            setTimeout(() => {
                document.forms["panForm"].submit();
            }, 100);
        };
    </script>
</head>

<body>
    <form id="panForm" name="panForm" action="{{ config('ayt.pan-card-service.url')  }}" method="post">
        <input type="hidden" name="Data" id="Data" value='{!! json_encode($formValue) !!}' />
        <center>Redirecting to pan application... Please wait....</center>
    </form>
</body>

</html>