<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phiếu Mượn</title>
    <style>
        .dd2 { width: 720px; }
        .warning { color: red; font-size: 12px; }
    </style>
</head>
<body>
    <form method="post" action="http://localhost/quanlythuvien/themphieumuon_c/Themmoi">
        <div class="form-group">
            <label for="mymamuontra">Mã Mượn Trả</label>
            <input type="text" class="form-control dd2" placeholder="Mã mượn trả" name="txtmamuontra">
            
            <label for="mymasach">Mã Sách</label>
            <input type="text" id="mymasach" class="form-control" placeholder="Mã sách" name="txtmasach">
            <span id="masach-warning" class="warning"></span>
            
            <label for="mymauser">Mã User</label>
            <input type="text" id="mymauser" class="form-control" placeholder="Mã user" name="txtmauser">
            
            <label for="myngaymuon">Ngày Mượn</label>
            <input type="date" id="myngaymuon" class="form-control" name="txtngaymuon">
            
            <label for="myngayphaitra">Ngày Phải Trả</label>
            <input type="date" id="myngayphaitra" class="form-control" name="txtngayphaitra">
            
            <button type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>
        </div>
    </form>
    
    <script>
        document.getElementById('mymasach').addEventListener('input', function() {
            var masach = this.value;
            var warning = document.getElementById('masach-warning');
            if (masach) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/quanlythuvien/themphieumuon_c/checkSach', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.tinhtrang === 0) {
                            warning.textContent = 'Sách đã có người mượn';
                        } else {
                            warning.textContent = '';
                        }
                    }
                };
                xhr.send('masach=' + encodeURIComponent(masach));
            } else {
                warning.textContent = '';
            }
        });
    </script>
</body>
</html>
