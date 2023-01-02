<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        {{--
        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->generate('Nguyen Trung Kien Va Mai Thi Thanh Thuy') !!}
            </div>
        </div>
        --}}

        {{--
        <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('Mai Thi Thanh Thuy Va Nguyen Trung Kien') !!}
            </div>
        </div>
        --}}

        {{--
            QrCode::format('png'); //Returns a PNG image
            QrCode::format('eps');  //Returns a EPS image
            QrCode::format('svg');  //Returns a SVG image
        --}}
        {{--
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">
        --}}

        {{--
        Mã hóa : Chúng ta cũng có thể thiết lập mã hóa ký tự:
        <div class="card">
            <div class="card-header">
                <h2>Mã hóa QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::encoding('UTF-8')->generate('NGUYỄN TRUNG KIÊN VÀ MAI THỊ THANH THÚY') !!}
            </div>
        </div>
        --}}

        {{--
        Margin : Đặt lề theo cách tùy chỉnh này:
        <div class="card">
            <div class="card-header">
                <h2>Margin: Đặt lề theo cách tùy chỉnh</h2>
            </div>
            <div class="card-body">
                {!! QrCode::margin(1)->encoding('UTF-8')->generate('NGUYỄN TRUNG KIÊN VÀ MAI THỊ THANH THÚY') !!}
            </div>
        </div>
        --}}

        {{-- Tin nhắn văn bản : Chúng ta có thể viết sms bằng mã QR. --}}
        {{--
        <div class="card">
            <div class="card-header">
                <h2>Tin nhắn văn bản : Chúng ta có thể viết sms bằng mã QR.</h2>
            </div>
            <div class="card-body">
                {!! QrCode::encoding('UTF-8')->SMS('555-555-5555', 'Demo gửi SMS tin nhắn văn bản'); !!}
            </div>
        </div>
        --}}

        {{-- Số điện thoại di động : Quay số điện thoại di động từ mã QR được quét. --}}
        {{--
        <div class="card">
            <div class="card-header">
                <h2>Số điện thoại di động : Quay số điện thoại di động từ mã QR được quét.</h2>
            </div>
            <div class="card-body">
                {!! QrCode::phoneNumber('0981284476'); !!}
            </div>
        </div>
        --}}

        {{-- Email : Chúng ta cũng có thể tự động điền vào email, subject và body khi quét mã QR: --}}
        {{--
        <div class="card">
            <div class="card-header">
                <h2>Email : Chúng ta cũng có thể tự động điền vào email, subject và body khi quét mã QR</h2>
            </div>
            <div class="card-body">
                {!! QrCode::encoding('UTF-8')->email('nguyenkien11202000@gmail.com', 'This is the email.', 'Nguyễn Trung Kiên Và Mai Thị Thanh Thúy.'); !!}
            </div>
        </div>
        --}}

        {{-- Vị trí địa lý : Truyền kinh độ và vĩ độ thông qua mã QR: --}}
        {{--
        <div class="card">
            <div class="card-header">
                <h2>Vị trí địa lý : QrCode::geo($latitude, $longitude);</h2>
            </div>
            <div class="card-body">
                {!! QrCode::geo(37.822214, -122.481769); !!}
            </div>
        </div>
        --}}
    </div>
</body>
</html>
