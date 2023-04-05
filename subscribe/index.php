<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    #cwut {
        color: #5A7670;
        font-size: 50px;
    }
</style>

<body>

    <div class="container mt-4">
        <form action="index.php" method="POST">
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <button class="btn btn-primary" onclick="sendEmail()" value="Send an Email" id="btn">Get in Touch</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function sendEmail() {
            var email = $("#email");

            if (isNotEmpty(email)) {
                $.ajax({
                    url: 'subscribe.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        email: email.val(),
                    },
                    success: function(response) {
                        $('#myForm')[0].reset();
                        $('.send-notification').text("Massage send successfully.");
                    }
                })
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else {
                caller.css('border', '')
                return true;
            }
        }
    </script>

</body>

</html>