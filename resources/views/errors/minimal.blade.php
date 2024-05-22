<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container h1 {
            font-size: 96px;
            margin-bottom: 10px;
            color: #007bff;
        }
        .container p {
            font-size: 30px;
            margin-top: 10px;
        }
        .container a {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 30px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        .container a:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 12px rgba(0, 91, 187, 0.2);
        }
        .container img {
            width: 550px;
            margin-bottom: 20px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
               <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcmNkaWNuaHgxbGFia3B6aTFma3k2ZmNsMWE4d3Z3bXNhdmphemY0MCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/MZocLC5dJprPTcrm65/giphy.gif" alt="Errore">
 
               <h1>@yield('code')</h1>

        <p>@yield('message')</p>
        <a href="{{ url('/projects') }}">Torna alla Home</a>
    </div>
</body>
</html>
