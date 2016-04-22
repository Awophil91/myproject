<body>
<strong>Welcome to manager!</strong><br/>
You have {{ $theCount }} product(s)!<br/>
Here is an image:

<img src="{{ $message->embed(storage_path().'/app/public/nerds/images/22.jpg') }}">

</body>