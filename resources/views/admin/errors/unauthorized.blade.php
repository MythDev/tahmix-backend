<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yetkisiz Giriş</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="text-center">
    <h1 class="display-1 fw-bold text-danger">403</h1>
    <h2 class="mb-4">Erişim İzniniz Yok</h2>
    <p class="lead text-muted mb-5">
        Giriş yaptığınız hesabın bu panele erişim yetkisi bulunmamaktadır.<br>
        Yönetici hesabıyla giriş yapmanız gerekmektedir.
    </p>
    <a href="{{ route('admin.login') }}" class="btn btn-primary">Giriş Sayfasına Dön</a>
</div>

</body>
</html>
