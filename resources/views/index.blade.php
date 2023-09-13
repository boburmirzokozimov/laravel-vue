<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/centrifuge@5.0.0/dist/centrifuge.js"></script>
</head>
<body>
Hello
<script>
    const centrifuge = new Centrifuge('wss://socket.sab-lab.com/connection/websocket', {
        token: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMiIsImNoYW5uZWxzIjpbImZpbkhlbHBSb29tcyJdfQ.xLl2F11gxV1116zfD7ZQJWpxZdr6JhhyGub2moCy9Lg'
    });

    // Allocate Subscription to a channel.
    const sub = centrifuge.newSubscription('finHelpRooms.10');
    console.log(sub);

    // React on `news` channel real-time publications.
    sub.on('publication', function (ctx) {
        console.log(ctx);
    });

    // Trigger subscribe process.
    sub.subscribe();

    // Trigger actual connection establishement.
    centrifuge.connect();
</script>
</body>
</html>
