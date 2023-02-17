
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Righteous&display=swap" rel="stylesheet">
<style>
    body{
        width: 100%;
        height: 100vh;
        overflow: hidden;
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
.headding404{
    font-family: 'Anton', sans-serif;
    font-size: 84px;
    text-align: center;
    position: relative;
    z-index: 2;

}
.headding404::after{

    content: '401';
    color: #00000034;
    font-family: 'Anton', sans-serif;
    font-size: 284px;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    z-index: 1;

}
p{
    font-family: 'Open Sans', sans-serif;
    font-size: 24px;
    font-weight: 800;
    color: #ff0000;
}
.button a{
    font-family: 'Open Sans', sans-serif;
    font-weight: 100px;
    font-size: 16px;
    display: inline-block;
    color: #ffffff;
    text-decoration: none;
    padding: 10px;
    background: #2177da;
    margin-top: 100px;
    border-radius: 6px;
    transition: .4s all ease-in-out;
}
.button{
    height: 50px;
}
.button a:hover{
    background: #1054a1;
}
</style>

</head>
  <body>
    <div class="headding404">
        <span>401</span>
    </div>
    <p>Unauthorized</p>
     <div class="button">
        <a href="{{ route('home') }}">Go To Home</a>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
