<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Operating system browser and device detection in laravel</title>
</head>
<body>
    <div style="margin: auto; width: 50%">
        <h1>Operating System</h1>
        @if(Browser::isWindows())
        <p>This is Windows Operating System</p>
        @elseif(Browser::isMac())
        <p>This is IOS/Mac Operating System</p>
        @elseif(Browser::isLinux())
        <p>This is Linux Based Operating System</p>
        @elseif(Browser::isAndroid())
        <p>This is Android Operating System</p>
        @endif

        <h1>Browser Detection</h1>
        @if(Browser::IsChrome())
        <p>Chrome Browser</p>
        @elseif(Browser::IsFirefox())
        <p>Firefox Browser</p>
        @elseif(Browser::IsEdge())
        <p>Edge Browser</p>
        @elseif(Browser::IsOpera())
        <p>Opera Browser</p>
        @endif

        <h1>Device Type</h1>
        @mobile
        <p>This is the mobile device</p>
        @endmobile

        @tablet
        <p>This is the tablet device</p>
        @endtablet

        @desktop
        <p>This is the desktop device</p>
        @enddesktop

        @browser("isBot")
        <p>Bot are identified</p>
        @endbrowser
    </div>
</body>
</html>
