<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
        crossorigin="anonymous"
    >
    
    <title>Mail Testing</title>
</head>

<body>
    <main class="container col-md-4 mt-5">
        <h1>Email Form</h1>
        <form action="mail.php" method="POST">
            <div class="form-group">
                <label for="toEmail">Email address</label>
                <input type="email" class="form-control" name="toEmail" id="toEmail" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
            </div>
            <div class="form-group">
                <label for="body">Body Text</label>
                <textarea class="form-control" name="body" id="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </main>
</body>

</html>
